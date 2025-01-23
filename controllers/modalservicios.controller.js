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
            prisma.modalservicios.findMany({
                skip: skip,
                take: limit,
                include: {
                    servicio: true
                }
            }),
            prisma.modalservicios.count()
        ]).then(data => {
            return res.json({
                data: data[0],
                pagination: {
                    currentPage: page,
                    totalPages: Math.ceil(data[1] / limit),
                    totalItems: data[1],
                    itemsPerPage: limit
                }
            });
        }).catch(error => {
            return res.status(500).json({
                error: "Error al obtener los datos",
                details: error.message
            });
        });
    },

    // POST para guardar información
    create: async (req, res) => {
        try {
            const { nombre, telefono, correo, id_servicio } = req.body;

            // Validaciones
            if (!nombre || !telefono || !correo || !id_servicio) {
                return res.status(400).json({
                    error: "Todos los campos son requeridos",
                    requiredFields: ['nombre', 'telefono', 'correo', 'id_servicio']
                });
            }

            // Validar longitudes
            if (nombre.length > 100 || telefono.length > 9 || correo.length > 200) {
                return res.status(400).json({
                    error: "Longitud de campos excedida"
                });
            }

            const newRecord = await prisma.modalservicios.create({
                data: {
                    nombre,
                    telefono,
                    correo,
                    id_servicio: parseInt(id_servicio)
                },
                include: {
                    servicio: true
                }
            });

            return res.status(200).json({
                message: "Registro creado exitosamente",
                data: newRecord
            });
        } catch (error) {
            console.error('Error en create:', error);
            return res.status(500).json({
                error: "Error al crear el registro",
                details: error.message
            });
        }
    },

    // DELETE para eliminar registros
    delete: async (req, res) => {
        const id = req.body.id ?? "";

        if (!isNumeric(id)) {
            return res.json({ status: 400, message: "ID inválido" });
        }

        await prisma.modalservicios.delete({
            where: {
                id: parseInt(id)
            }
        }).then(data => {
            return res.json({
                status: 200,
                message: "Eliminado con éxito",
                data: data
            });
        }).catch(error => {
            console.log(error);
            return res.json({ status: 500, message: "Server error" });
        });
    }
};