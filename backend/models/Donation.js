const mongoose = require("mongoose");

const donationSchema = new mongoose.Schema({
    userId: {
        type: mongoose.Schema.Types.ObjectId,
        ref: "User"
    },
    mosqueId: {
        type: mongoose.Schema.Types.ObjectId,
        ref: "Mosque"
    },
    amount: Number,
    message: String,
    paymentMethod: String,
    createdAt: {
        type: Date,
        default: Date.now
    }
});

module.exports = mongoose.model("Donation", donationSchema);