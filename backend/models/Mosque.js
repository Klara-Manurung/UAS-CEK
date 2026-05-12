const mongoose = require("mongoose");

const mosqueSchema = new mongoose.Schema({
    mosqueCode: String,
    mosqueName: String,
    province: String,
    city: String,
    address: String,
    images: [String],
    donationTarget: Number,
    collectedAmount: {
        type: Number,
        default: 0
    },
    description: String
});

module.exports = mongoose.model("Mosque", mosqueSchema);