const express = require("express")
const app = express()

const controller = require("../controllers/modalbranding.controller")

app.get("/", controller.get)


module.exports = app