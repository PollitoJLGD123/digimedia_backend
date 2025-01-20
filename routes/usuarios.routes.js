const express = require("express")
const app = express()

const controller = require("../controllers/usuarios.controller")

//Api para mandar toda la informacion de tipo GET con paginación de 20 en 20
//Api para guardar información en el backend ( Nombre, Usuario, Password, rol)
//Api para actualizar información del backend ( Nombre, Usuario, Password, rol)
//Api para eliminar un registro dependiendo del iD ue llegue del frontend por query

app.get("/", controller.get)


module.exports = app