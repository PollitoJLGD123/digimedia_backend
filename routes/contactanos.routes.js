const express = require("express")
const app = express()

const controller = require("../controllers/contactanos.controller")

//Api para mandar toda la informacion de tipo GET con paginación de 20 en 20
//Api para guardar información en el backend ( Nombre, Email, Servicio, numero y mensaje )
//Api para actualizar información el Estado de 0 a 1
//Api para eliminar un registro dependiendo del iD ue llegue del frontend por query

app.get("/", controller.get)
app.post("/", controller.create)
app.put("/", controller.update)
app.delete("/", controller.delete)

module.exports = app