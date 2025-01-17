const express = require("express")
const app = express()

const controller = require("../controllers/personweb2.controller")

app.get("/", controller.get)

module.exports = app