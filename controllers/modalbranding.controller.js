const { PrismaClient } = require('@prisma/client');
const prisma = require("../orm")
const { isNumeric, isEmpty } = require("validator")
const bcrypt = require("bcryptjs")


module.exports = {
    // GET con paginación de 20 en 20
    get: async (req, res) => {

        const page = parseInt(req.query.page) || 1;
        const limit = 20;
        const skip = (page - 1) * limit;

        await prisma.$transaction([
            prisma.modalbranding.findMany({
                skip: skip, take: limit
            })
            ,
            prisma.modalbranding.count()
        ]).then(data => {
            return res.json({
                data:data [0],
                pagination: {
                    currentPage: page,
                    totalPages: Math.ceil(data[1] / limit),
                    totalItems: data[1],
                    itemsPerPage: limit
                }
            });
        }).catch(error =>{
            return res.status(500).json({
                error: "Error al obtener los datos",
                details: error.message
            });
        })

    },

    // POST para guardar información
    create: async (req, res) => {
        try {
            // Validar si el body está vacío
            if (!req.body || Object.keys(req.body).length === 0) {
                return res.status(400).json({
                    error: "El body de la petición está vacío",
                    tip: "Asegúrate de enviar un JSON con los campos: nombre, telefono, correo"
                });
            }

            const { nombre, telefono, correo } = req.body;

            // Validaciones de campos requeridos
            const missingFields = [];
            if (!nombre) missingFields.push('nombre');
            if (!telefono) missingFields.push('telefono');
            if (!correo) missingFields.push('correo');

            if (missingFields.length > 0) {
                return res.status(400).json({
                    error: "Campos faltantes",
                    missingFields,
                    receivedData: req.body
                });
            }

            // Validaciones de longitud según el schema
            if (nombre.length > 100) {
                return res.status(400).json({
                    error: "El nombre excede los 100 caracteres permitidos"
                });
            }

            if (telefono.length > 9) {
                return res.status(400).json({
                    error: "El teléfono excede los 9 caracteres permitidos"
                });
            }

            if (correo.length > 200) {
                return res.status(400).json({
                    error: "El correo excede los 200 caracteres permitidos"
                });
            }

            // Crear registro con Prisma
            const newRecord = await prisma.modalbranding.create({
                data: {
                    nombre,
                    telefono,
                    correo
                }
            });

            return res.status(200).json({
                message: "Registro creado exitosamente",
                data: newRecord
            });
        } catch (error) {
            console.error('Error en create:', error);
            if (error.code === 'P2002') {
                return res.status(400).json({
                    error: "Ya existe un registro con estos datos",
                    details: error.meta?.target || error.message
                });
            }
            return res.status(500).json({
                error: "Error al crear el registro",
                details: error.message
            });
        }
    },

    
    //para el delete
    delete: async (req, res) => {

        const id = req.body.id ?? ""

        if (!isNumeric(id)) {
            return res.json({ status: 400, message: "No pasó la validación" })
        }

        await prisma.modalbranding.delete({
            where: {
                id: parseInt(id)
            }
        }).then(data => {
            return res.json({ status: 200,
                message: "Eliminado con éxito",
                data: data })
        }).catch(error => {
            console.log(error);
            return res.json({ status: 500, message: "Server error" })
        })

    },
};