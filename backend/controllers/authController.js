const User = require("../models/User");
const bcrypt = require("bcryptjs");

exports.register = async (req,res)=>{
    const {name,email,password} = req.body;

    const hashed = await bcrypt.hash(password,10);

    const user = await User.create({
        name,
        email,
        password: hashed
    });

    res.json(user);
};