# Email with AJAX

This is a sample project using AJAX to handle mail submission. It's implemented with async / await and imported into the main JavaScript file as a module / component.

There's a (very) simple form that sends a user's first name, last name, email and message to an API endpoint; it has some extremely simple success / failure handling.

## Installation
Clone the repo to your local dev environment. This uses PHP on the back end, so you'll need something like WAMP or MAMP to run it (alternatively configure a Docker project and run it that way).

## Usage
Pretty straightforward - navigate to the live instance and try submitting an email. The endpoint isn't connected to an API at this point - just a simple POST check and it returns back a success or error message, depending on the outcome.

CSS is generated with SASS using the command line tools. You'll need dart-sass (preferred) - [you can get it here](https://sass-lang.com/install)

## Credits
TVR - this is a stripped-down example of async / await and API endpoint testing for Authoring Level 3. Not for production. Demo only!

##Written Path 
AJAX EMAIL: path project description step by step 
https://docs.google.com/document/d/1iRjWaC86ZyaaZAlsrrswz_1QV153Uq3ZrY0hr6gds7E/edit?usp=sharing

## License
MIT License

Copyright 2022 Laura Albarracin

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.