const prisma = require("../orm")
const { isNumeric, isEmpty } = require("validator")
const bcrypt = require("bcryptjs")
const jwt = require("../services/jwt.service")

module.exports = {
    get: async (req, res) => {

        let page = req.query.page ?? ""

        let offset = 20
        page = isNumeric(page) ? parseInt(page) : 1

        await prisma.$transaction([
            prisma.usuarios.findMany({
                skip: offset * (page - 1),
                take: offset,
                select: {
                    id: true,
                    nombre: true,
                    rol: true,
                    usuario: true
                }
            }),
            prisma.usuarios.count()
        ]).then(data => {
            return res.json({ status: 200, data: data[0], count: data[1] })

        }).catch(error => {
            return res.json({ status: 500, message: "Server Error" })
        })
    },

    create: async (req, res) => {

        const name = req.body.name ?? ""
        const usuario = req.body.usuario ?? ""
        const rol = "Administrador"
        const password = req.body.password ?? ""

        if (isEmpty(name) || isEmpty(usuario) || isEmpty(password)) {
            return res.json({ status: 400, message: "No pasó la validación" })
        }


        await prisma.usuarios.findFirst({
            where: {
                usuario: usuario
            }
        }).then(async data => {
            if (data != null) {
                return res.json({ status: 409, message: "Usuario Existente" })
            }

            let salt = bcrypt.genSaltSync(10);
            let hash = bcrypt.hashSync(password, salt);

            await prisma.usuarios.create({
                data: {
                    nombre: name.toLowerCase(),
                    usuario: usuario.toLowerCase(),
                    contrasena: hash,
                    rol: rol
                }
            }).then(data => {
                return res.json({ status: 200, data: data })
            }).catch(error => {
                console.log(error);

                return res.json({ status: 500, message: "Server error" })
            })

        }).catch(error => {
            return res.json({ status: 400, message: "Server error" })
        })



    },

    login: async (req, res) => {

        const usuario = req.body.usuario ?? ""
        const password = req.body.password ?? ""

        if (isEmpty(usuario) || isEmpty(password)) {
            return res.json({ status: 400, message: "No pasó la validación" })
        }


        await prisma.usuarios.findFirst({
            where: {
                usuario: usuario
            }
        }).then(async data => {
            if (data == null) {
                return res.json({ status: 409, message: "Usuario No Existente" })
            }

            if (!bcrypt.compareSync(password, data.contrasena)) {
                return res.json({ status: 409, message: "Contraseña invalida" })
            }

            return res.json({ status: 200, message: "Ingresaste", token: jwt.token(data) })

        }).catch(error => {
            return res.json({ status: 400, message: "Server error" })
        })



    },

    updatePassword: async (req, res) => {
        const id = req.params.id ?? ""
        const password = req.body.password ?? ""

        if (!isNumeric(id) || isEmpty(password)) {
            return res.json({ status: 400, message: "No pasó la validación" })
        }

        let salt = bcrypt.genSaltSync(10);
        let hash = bcrypt.hashSync("B4c0/\/", salt);

        await prisma.usuarios.update({
            where: {
                id: parseInt(id)
            },
            data: {
                contrasena: hash
            }
        }).then(data => {
            return res.json({ status: 200, data: data })
        }).catch(error => {
            console.log(error);
            return res.json({ status: 500, message: "Server error" })
        })

    },

    update: async (req, res) => {

        const id = req.params.id ?? ""
        const name = req.body.name ?? ""
        const usuario = req.body.usuario ?? ""


        if (!isNumeric(id) || isEmpty(name) || isEmpty(usuario)) {
            return res.json({ status: 400, message: "No pasó la validación" })
        }

        await prisma.usuarios.findFirst({
            where: {
                id: parseInt(id)
            }
        }).then(async data => {

            if (data == null) {
                return res.json({ status: 400, message: "El usuairio no existe" })
            }

            if (data.usuario.toLowerCase() == "admin") {
                return res.json({ status: 400, message: "El admin no puede ser actualizado" })
            }

            await prisma.usuarios.update({
                where: {
                    id: parseInt(id)
                },
                data: {
                    nombre: name.toLowerCase(),
                    usuario: usuario.toLowerCase()
                }
            }).then(data => {
                return res.json({ status: 200, data: data })
            }).catch(error => {
                console.log(error);
                return res.json({ status: 500, message: "Server error" })
            })

        }).catch(error => {
            console.log(error);
            return res.json({ status: 500, message: "Server error" })
        })




    },

    delete: async (req, res) => {

        const id = req.params.id ?? ""

        if (!isNumeric(id)) {
            return res.json({ status: 400, message: "No pasó la validación" })
        }

        await prisma.usuarios.findFirst({
            where: {
                id: parseInt(id)
            }
        }).then(async data => {

            if (data.usuario.toLowerCase() == "admin") {
                return res.json({ status: 400, message: "El admin no puede ser eliminado" })
            }

            await prisma.usuarios.delete({
                where: {
                    id: parseInt(id)
                }
            }).then(data => {
                return res.json({ status: 200, data: data })
            }).catch(error => {
                console.log(error);
                return res.json({ status: 500, message: "Server error" })
            })

        }).catch(error => {
            console.log(error);
            return res.json({ status: 500, message: "Server error" })
        })
    },
}