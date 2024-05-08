# SEMD-EMAIL-WITH-NODEMAILER

[![Youtube][youtube-shield]][youtube-url]
[![Facebook][facebook-shield]][facebook-url]
[![Instagram][instagram-shield]][instagram-url]
[![LinkedIn][linkedin-shield]][linkedin-url]

Thanks for visiting my GitHub account!

**Nodemailer** is a module for Node.js applications to allow easy as cake email sending. The project got started back in 2010 when there was no sane option to send email messages, today it is the solution most Node.js users turn to by default.[see-more](https://www.nodemailer.com/)

### [Code-Example](https://github.com/learnwithfair/mern-user-admin-authentication)

## How to use this template

- Step-1: install package

```js
npm install nodemailer

```

- Step-2: helpers/email.js

```js
const dev = require("../config");
const nodemailer = require("nodemailer");

const transporter = nodemailer.createTransport({
  host: "smtp.gmail.com",
  port: 587,
  secure: false, // true for 465, false for other ports
  auth: {
    user: dev.app.smtpUsername, // generated ethereal user
    pass: dev.app.smtpPassword, // generated ethereal password
  },
});

exports.sendEmailWithNodeMailer = async (emailData) => {
  try {
    const mailOptions = {
      from: dev.app.smtpUsername, // sender address
      to: emailData.email, // list of receivers
      subject: emailData.subject, // Subject line
      html: emailData.html, // html body
    };

    // send mail with defined transport object
    const info = await transporter.sendMail(mailOptions);
    console.log("Message sent: %s", info.response);
  } catch (error) {
    console.log("Error occurred while sending Email: ", error);
    throw error; // Propagate the error up to the caller
  }
};
```

- Step-2: controllers/auth.js( api/register)

```js
// api/register
const registerUser = async (req, res) => {
  try {
    const { name, email, password, phone } = req.body;

    const existingUser = await User.findOne({ email });

    if (existingUser) {
      return res.status(400).json({
        message: "user already exist with this email",
      });
    }

    //     // hash password
    const hashedPassword = await bcrypt.hash(password, 10);

    const token = jwt.sign(
      { name, email, hashedPassword, phone },
      String(dev.app.accountActivationKey),
      { expiresIn: "10m" }
    );

    console.log(token);

    const emailData = {
      email,
      subject: "Account Activation Email",
      html: `
      <h2> Hello ${name} . </h2>
      <p> Please click here to  activate your account http://127.0.0.1:3000/auth/activte/${token} </p>
      `, // html body
    };

    sendEmailWithNodeMailer(emailData);
  } catch (error) {
    return res.json({
      message: error.message,
    });
  }
};
```

- Step-3: controllers/auth.js (api/activate-account)

```js
// api/activate-account
const accountActivation = async (req, res) => {
  console.log("account activate");
  try {
    const { token } = req.body;
    if (token) {
      jwt.verify(
        token,
        String(dev.app.accountActivationKey),
        async (err, decoded) => {
          if (err) {
            console.log("JWT Verification error", err);
            return res.status(401).json({
              error: "Expired Link. signup again",
            });
          }

          const { name, email, hashedPassword, phone } = jwt.decode(token);

          const newUser = new User({
            name,
            email,
            password: hashedPassword,
            phone,
            isVerify: 1,
          });

          console.log(newUser);

          // double guard
          const existingUser = await User.findOne({ email });

          if (existingUser) {
            return res.status(400).json({
              message: "user already exist with this email",
            });
          }

          const userData = await newUser.save();
          if (!userData) {
            return res.status(400).send({
              message: "user was not created",
            });
          }

          return res.status(200).send({
            message: "user was created successfully ! Please signin",
          });
        }
      );
    }
  } catch (error) {
    res.json({
      message: error.message,
    });
  }
};
```

## Follow Me

[<img src='https://cdn.jsdelivr.net/npm/simple-icons@3.0.1/icons/github.svg' alt='github' height='40'>](https://github.com/learnwithfair) [<img src='https://cdn.jsdelivr.net/npm/simple-icons@3.0.1/icons/facebook.svg' alt='facebook' height='40'>](https://www.facebook.com/learnwithfair/) [<img src='https://cdn.jsdelivr.net/npm/simple-icons@3.0.1/icons/instagram.svg' alt='instagram' height='40'>](https://www.instagram.com/learnwithfair/) [<img src='https://cdn.jsdelivr.net/npm/simple-icons@3.0.1/icons/twitter.svg' alt='twitter' height='40'>](https://www.twiter.com/learnwithfair/) [<img src='https://cdn.jsdelivr.net/npm/simple-icons@3.0.1/icons/youtube.svg' alt='YouTube' height='40'>](https://www.youtube.com/@learnwithfair)

<!-- MARKDOWN LINKS & IMAGES -->

[youtube-shield]: https://img.shields.io/badge/-Youtube-black.svg?style=flat-square&logo=youtube&color=555&logoColor=white
[youtube-url]: https://youtube.com/@learnwithfair
[facebook-shield]: https://img.shields.io/badge/-Facebook-black.svg?style=flat-square&logo=facebook&color=555&logoColor=white
[facebook-url]: https://facebook.com/learnwithfair
[instagram-shield]: https://img.shields.io/badge/-Instagram-black.svg?style=flat-square&logo=instagram&color=555&logoColor=white
[instagram-url]: https://instagram.com/learnwithfair
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=flat-square&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/company/learnwithfair
