const express = require("express")
const app = express()
const controller = require("../controllers/modalservicios.controller")
const authMiddle = require("../middlewares/jwt.middleware")

// GET con paginación
app.get("/", authMiddle, controller.get)

// POST para crear nuevo registro
app.post("/", authMiddle, controller.create)

// DELETE para eliminar registro
app.delete("/", authMiddle, controller.delete)

module.exports = app