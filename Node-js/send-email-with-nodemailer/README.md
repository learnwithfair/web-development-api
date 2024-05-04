# SEMD-EMAIL-WITH-NODEMAILER

[![Youtube][youtube-shield]][youtube-url]
[![Facebook][facebook-shield]][facebook-url]
[![Instagram][instagram-shield]][instagram-url]
[![LinkedIn][linkedin-shield]][linkedin-url]

Thanks for visiting my GitHub account!

<img src ="https://logowik.com/content/uploads/images/sign-in-with-facebook-button1655.jpg" height = "200px" width = "200px"/>**Sign in with Facebook** makes it easy for you to sign in and sign up to websites and apps across the internet with the trusted security of your Facebook Account. It eliminates your dependency on passwords, which reduces the frustrations and security risks associated with them. [see-more](https://nodemailer.com/about/)

### [Code-Example](https://github.com/learnwithfair/mern-user-admin-mgt)

## Source Code (Download)

- [Source-code]()
- [Documentation](https://github.com/learnwithfair/node-express-documentation)

## Required Software (Download)

- VS Code, Download ->https://code.visualstudio.com/download
- Node, Download-> https://nodejs.org/en/download
- MongoDB Shell(msi) , Download-> https://www.mongodb.com/try/download/shell
- MongoDB Compass (msi), Download-> https://www.mongodb.com/try/download/community
- Postman, Download-> https://www.postman.com/downloads/

**Or Online Database (MongoDB Atlas)**

- Register -> https://www.mongodb.com/cloud/atlas/register

## ========== Environment Setup ==========

1. Install Node.js
2. To verify installation into command form by node -v
3. For initialization npm write the query in the command window as npm init -y
4. Setup the opening file into the package.json and change the file with main:'server.js'
5. To create a server using the express package then write a query into the command window as npm install express.
   Write code in the server file for initialization
   const express = require("express");
   const app = express();
   app.listen(3000, () => {
   console.log("Server is running at http://localhost:3000");
   });

6. Install the nodemon package for automatically running the server as- npm i --save-dev nodemon (For Developing purpose)
7. setup the package.json file in the scripts key, write
   "scripts": {
   "start": "node ./resources/backend/server.js",
   "dev": "nodemon ./resources/backend/server.js",
   "test": "echo \"Error: no test specified\" && exit 1"
   },
8. use the Morgan package for automatic restart. Hence install the morgan package as npm install --save-dev morgan (Development purpose)
   Write code in the server file for initialization
   const morgan = require("morgan");
   app.use(morgan("dev")); --> Middlewire.
9. Install Postman software for API testing by the URL endpoint.
10. Install Mongobd + MongobdCompass and Mongoshell (For Database)

## ========== Connect MongoDB Database ==========

1. Install Mondodb + Mongodb Compass and Mongodb Shell download from the google.
2. Set up Environment Variable in drive:c/program file
3. Create a directory in the base path of the c drive named data. Inside the data directory create another folder db.
4. Write the command in the CMD window as Mongod. And write the other command in the other CMD window as mongosh.
5. Then Check the version as mongod --version and mongosh --version.
6. Install mongoose package as npm i mongoose
7. Create an atlas account. In the atlas account create a cluster that have a user(as atlas admin) and network access with any access IP address.
8. Connect the database using URL from the atlas cluster or local Mongodb compass using the mongoose package as mongoose. connect('mongodb://localhost:27017/database-name);

## How to use this template

- Step-1: get facebook client id

  - visit url-> https://developers.facebook.com/
  - register as developer
  - create new app as consumer
  - `npm install react-facebook-login`
  - change in package.json `"start": "HTTPS=true react-scripts start",`

- Step-2: In the Frontend site

```js
// Facebook.js
import React from "react";
import FacebookLogin from "react-facebook-login/dist/facebook-login-render-props";
import { loginWithFacebook } from "../services/AuthService";

const Facebook = () => {
  const responseFacebook = async (response) => {
    try {
      // 1. send the userID and accessToken to the server
      const result = await loginWithFacebook({
        userID: response.userID,
        accessToken: response.accessToken,
      });
      console.log("Facebook signin success: ", result);
    } catch (error) {
      console.log(error);
      console.log("Facebook signin error: ", error.response.data.message);
    }
  };

  return (
    <div className="pb-3">
      <FacebookLogin
        appId="3326779317563993"
        autoLoad={false}
        callback={responseFacebook}
        render={(renderProps) => (
          <button
            onClick={renderProps.onClick}
            className="btn btn-danger btn-lg btn-block"
          >
            <i className="fab fa-facebook p-2"></i>Login With Facebook
          </button>
        )}
      />
    </div>
  );
};

export default Facebook;
```

- Step-3: In the `services/AuthService` path

```js
export const loginWithFacebook = async (data) => {
  const response = await axios.post(
    `http://localhost:3030/api/facebook-login`,
    data
  );
  return response.data;
};
```

- Step-4: In the Server site

  - install `npm install node-fetch@2`

```js
// facebook
authRoutes.post("/facebook-login", handleFacebookLogin);
```

- **Controller part**

```js
const fetch = require("node-fetch");
const handleFacebookLogin = async (req, res) => {
  try {
    const { userID, accessToken } = req.body;

    // create the url for requesting userInfo
    const url = `http://graph.facebook.com/v2.11/${userID}/?fields=id,name,email&access_token=${accessToken}`;

    // make the request with fetch api
    const response = await fetch(url);
    const data = await response.json();
    const { name, email, id } = data;

    // check user with this email already exist or not
    const exsitingUser = await User.findOne({ email });
    if (exsitingUser) {
      console.log("user exist");
      // create a token for user
      const token = jwt.sign(
        { _id: exsitingUser._id },
        String(dev.app.jwtSecretKey),
        {
          expiresIn: "7d",
        }
      );

      // step 7: create user info
      const userInfo = {
        _id: exsitingUser._id,
        name: exsitingUser.name,
        email: exsitingUser.email,
        phone: exsitingUser.phone,
      };

      return res.json({ token, userInfo });
    } else {
      // if user does not exist create a new user
      // let create a dummy password
      let password = email + dev.app.jwtSecretKey;
      const newUser = new User({
        name,
        email,
        password,
      });

      const userData = await newUser.save();
      if (!userData) {
        return res.status(400).send({
          message: "user was not created with google",
        });
      }

      // if user is created
      const token = jwt.sign(
        { _id: userData._id },
        String(dev.app.jwtSecretKey),
        {
          expiresIn: "7d",
        }
      );

      // step 7: create user info
      const userInfo = {
        _id: userData._id,
        name: userData.name,
        email: userData.email,
        phone: userData.phone,
        isAdmin: userData.isAdmin,
      };

      return res.json({ token, userInfo });
    }

    res.send("facebook login successful");
  } catch (error) {
    res.status(500).send({
      message: error.message,
    });
  }
};
```

- Step-5: Setup .env file in the server folder

```env
SERVER_PORT=8080
MONGODB_URL=
JWT_ACCOUNT_ACTIVATION_KEY=
JWT_RESET_PASSWORD_KEY=
JWT_ACCESS_TOKEN_KEY=
JWT_REFRESH_TOKEN_KEY=
SMTP_USERNAME=YOUR_GMAIL_HERE
SMTP_PASSWORD=
CLIENT_URL=
SESSION_SECRET=
GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=

```

- Step-6: Setup for secrect key

```js
require("dotenv").config();

const dev = {
  db: {
    mongoURL:
      process.env.MONGODB_URL || "mongodb://127.0.0.1:27017/database-name",
  },
  app: {
    port: process.env.SERVER_PORT || 8000,
    jwtAccountActivationKey: process.env.JWT_ACCOUNT_ACTIVATION_KEY,
    jwtResetPasswordKey: process.env.JWT_RESET_PASSWORD_KEY,
    jwtAcessTokenKey: process.env.JWT_ACCESS_TOKEN_KEY,
    jwtRefreshTokenKey: process.env.JWT_REFRESH_TOKEN_KEY,
    smtpUsername: process.env.SMTP_USERNAME,
    smtpPassword: process.env.SMTP_PASSWORD,
    clientUrl: process.env.CLIENT_URL,
    googleClientId: process.env.GOOGLE_CLIENT_ID,
    googleClientSecret: process.env.GOOGLE_CLIENT_SECRET,
  },
};

module.exports = dev;
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
