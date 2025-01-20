const express = require("express")
const app = express()

const controller = require("../controllers/libroreclamacion.controller")

//Api para mandar toda la informacion de tipo GET con paginación de 20 en 20
//Api para guardar información en el backend ( nompre, apellido, tipo documento, nmr documento, email, celular, direccion, distrito, ciudad, tipo de reclamo, servicio, reclamo, ckeck, acepta politica de privacidad)
//Api para eliminar un registro dependiendo del iD ue llegue del frontend por query

app.get("/", controller.get)


module.exports = app