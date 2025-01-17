const express = require("express")
const app = express()

const controller = require("../controllers/personredes4.controller")

app.get("/", controller.get)


module.exports = app