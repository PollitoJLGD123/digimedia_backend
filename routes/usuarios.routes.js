const express = require("express")
const app = express()

const controller = require("../controllers/usuarios.controller")

app.get("/", controller.get)


module.exports = app