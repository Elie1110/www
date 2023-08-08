$(document).ready(function () {
  // Function to fetch all cars from the server
  function getAllCars() {
    $.ajax({
      url: "PHP/car.php",
      type: "GET",
      dataType: "json",
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
        var photoUrls = car.photo.split(",");
        var photoHtml = "";
        photoUrls.forEach(function (url) {
          photoHtml +=
            '<img src="uploads/' + url + '" alt="Car Image" width="100" height="100">';
        });
        row.append($("<td>").html(photoHtml));
      } else {
        row.append(
          $("<td>").html(
            '<img src="uploads/default.png" alt="Car Image" width="100" height="100">'
          )
        );
      }

      // Add the Add to Cart button with a data attribute for car_id
      var addToCartButton = $(
        '<button>').text('Add to Cart').attr('data-car-id', car.car_id).addClass('btn btn-success btn-sm btn-add-to-cart');
      row.append($("<td>").append(addToCartButton));

      row.append($("<td>").html('<a href="view_car.php?car_id=' + car.car_id + '">View</a>'));
      tableBody.append(row);
    });

    // Initialize DataTable on the table
    $("#cars_table").DataTable();

    // Add click event handler for Add to Cart button
    $(".btn-add-to-cart").click(function () {
      var carId = $(this).data('car-id');
      addToCart(carId); // Call the addToCart function to add the car to the cart
    });
  }

  // Function to add a car to the cart
  function addToCart(carId) {
    var userId = $("#user_id").val();
    $.ajax({
      url: "PHP/cart.php",
      type: "POST",
      dataType: "json",
      data: { user_id: userId, car_id: carId },
      success: function (response) {
        if (response.success) {
          alert("Car added to cart successfully!");
          // Refresh the car list to reflect the updated cart status
          getAllCars();
        } else {
          alert("Failed to add car to cart. Please try again.");
        }
      },
      error: function () {
        alert("Error adding car to cart. Please try again later.");
      },
    });
  }

  // Fetch all cars on page load
  getAllCars();
});
