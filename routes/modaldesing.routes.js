const express = require("express")
const app = express()

const controller = require("../controllers/modaldesing.controller")

//Autenticador de token, dato que ingresa del header = (Authorization: [token generado por el login])
const authMiddle = require("../middlewares/jwt.middleware")

//Api para mandar toda la informacion de tipo GET con paginación de 20 en 20
app.get("/", authMiddle , controller.get)

//Api para guardar información en el backend ( Nombre, Email, numero )
app.post("/", authMiddle , controller.create);

//Api para eliminar un registro dependiendo del iD ue llegue del frontend por query
app.delete("/", authMiddle , controller.delete);

module.exports = app