const mongoose = require("mongoose");

const provinceSchema = new mongoose.Schema({
    provinceName: String,
    cities: [String]
});

module.exports = mongoose.model("Province", provinceSchema);