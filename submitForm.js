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



