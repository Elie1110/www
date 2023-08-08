// Get references to the select elements
const brandSelect = document.getElementById('marque');
const modelSelect = document.getElementById('model');

// Function to fetch models based on the selected brand
function fetchModelsByBrand() {
  // Get the selected brand value
  const selectedBrand = brandSelect.value;

  // Clear the existing options in the model select
  modelSelect.innerHTML = '<option value="">Select Model</option>';

  // If no brand is selected, do not make the AJAX request
  if (!selectedBrand) return;

  // Make an AJAX request to fetch the models for the selected brand
  const xhr = new XMLHttpRequest();
  xhr.open('GET', 'PHP/model.php?brand=' + encodeURIComponent(selectedBrand), true);
  xhr.setRequestHeader('Content-Type', 'application/json');
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Parse the JSON response
      const models = JSON.parse(xhr.responseText);

      // Generate the options for the model select
      models.forEach(function (model) {
        const option = document.createElement('option');
        option.value = model.model_id;
        option.textContent = model.model_name;
        modelSelect.appendChild(option);
      });
    }
  };

  // Send the AJAX request
  xhr.send();
}

// Add an event listener to the brand select to trigger fetching models
brandSelect.addEventListener('change', fetchModelsByBrand);
