// submitForm.js

exports.handler = async function (event, context) {
  const { name, email, message } = JSON.parse(event.body);

  // Here, you can implement logic to store the data, e.g., in a database.
  // For simplicity, this example just logs the data.
  console.log(`Received form submission: ${name}, ${email}, ${message}`);

  return {
    statusCode: 200,
    body: JSON.stringify({ success: true }),
  };
};
// submitForm.js

const fs = require('fs');

exports.handler = async function (event, context) {
  const { name, email, message } = JSON.parse(event.body);

  // Create an object with the form data
  const formData = { name, email, message };

  // Convert the object to a JSON string
  const formDataJson = JSON.stringify(formData, null, 2);

  try {
    // Append the form data to a JSON file (you may want to use a database instead)
    fs.appendFileSync('formData.json', formDataJson + '\n');

    console.log('Form data saved:', formData);

    return {
      statusCode: 200,
      body: JSON.stringify({ success: true }),
    };
  } catch (error) {
    console.error('Error saving form data:', error);

    return {
      statusCode: 500,
      body: JSON.stringify({ success: false, error: 'Internal Server Error' }),
    };
  }
};

