const express = require("express")
const app = express()

const controller = require("../controllers/modaldesing.controller")

//Api para mandar toda la informacion de tipo GET con paginación de 20 en 20
app.get("/", controller.get)

//Api para guardar información en el backend ( Nombre, Email, numero )
app.post("/", controller.create);

//Api para eliminar un registro dependiendo del iD ue llegue del frontend por query
app.delete("/", controller.delete);

module.exports = app