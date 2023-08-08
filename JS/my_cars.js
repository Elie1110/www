$(document).ready(function () {
  // Function to fetch user's cars from the server
  function getUserCars() {
    var user_id = $("#user_id").val();
    $.ajax({
      url: "PHP/car.php",
      type: "GET",
      dataType: "json",
      data: {
        user_id: user_id
      },
      success: function (data) {
        // Populate the table with the fetched cars data
        populateTable(data);
      },
      error: function () {
        alert("Error fetching data. Please try again later.");
      },
    });
  }

  // Function to populate the table with cars data
  function populateTable(cars) {
    var tableBody = $("#cars_table tbody");
    tableBody.empty(); // Clear the table body before populating

    $.each(cars, function (index, car) {
      var row = $("<tr>");
      row.append($("<td>").text(car.brand_name));
      row.append($("<td>").text(car.category_name));
      row.append($("<td>").text(car.model_name));
      row.append($("<td>").text(car.car_year));
      row.append($("<td>").text(car.mileage));
      row.append($("<td>").text(car.fuel_type));
      row.append($("<td>").text(car.car_address));
      row.append($("<td>").text(car.price));

      // Check if car photos are available or use default photo
      if (car.photo) {
        var photoUrls = car.photo.split(','); // Split the comma-separated URLs
        var photoHtml = '';
        photoUrls.forEach(function (url) {
          photoHtml += '<img src="uploads/' + url + '" alt="Car Image" width="100" height="100">';
        });
        row.append($("<td>").html(photoHtml));
      } else {
        row.append($("<td>").html('<img src="uploads/default.png" alt="Car Image" width="100" height="100">'));
      }

      // Add the Edit button with a data attribute for car_id
      var editButton = $('<button>').text('Edit').attr('data-car-id', car.car_id).addClass('btn btn-primary btn-sm btn-edit');
      row.append($("<td>").append(editButton));

      // Add the Delete button with a data attribute for car_id
      var deleteButton = $('<button>').text('Delete').attr('data-car-id', car.car_id).addClass('btn btn-danger btn-sm btn-delete');
      row.append($("<td>").append(deleteButton));

      tableBody.append(row);
    });

    // Initialize DataTable on the table
    $("#cars_table").DataTable();

    // Add click event handler for Edit button
    $(".btn-edit").click(function () {
      var carId = $(this).data('car-id');
      // Redirect to the edit page with the car_id parameter
      window.location.href = 'edit_my_car.php?car_id=' + carId;
    });

    // Add click event handler for Delete button
    $(".btn-delete").click(function () {
      var carId = $(this).data('car-id');
      // Call the function to delete the car
      deleteCar(carId);
    });
  }

  // Function to delete a car by car_id
  function deleteCar(carId) {
    if (confirm("Are you sure you want to delete this car?")) {
      $.ajax({
        url: "PHP/car.php?car_id=" + carId,
        type: "DELETE",
        success: function (data) {
          // Refresh the table after successful deletion
          getUserCars();
        },
        error: function () {
          alert("Error deleting car. Please try again later.");
        },
      });
    }
  }

  // Fetch user's cars on page load
  getUserCars();
});
