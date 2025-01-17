const express = require("express")
const app = express()

const controller = require("../controllers/personcamino5.controller")

app.get("/", controller.get)

module.exports = app