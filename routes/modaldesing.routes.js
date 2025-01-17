const express = require("express")
const app = express()

const controller = require("../controllers/modaldesing.controller")

app.get("/", controller.get)

module.exports = app