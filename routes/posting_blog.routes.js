const express = require("express")
const app = express()

const controller = require("../controllers/posting_blog.controller")

app.get("/", controller.get)

module.exports = app