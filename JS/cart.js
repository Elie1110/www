$(document).ready(function () {
  // Function to fetch cars in the cart for a user
  function getCartItems() {
    var user_id = $("#user_id").val();
    $.ajax({
      url: "PHP/cart.php?user_id=" + user_id,
      type: "GET",
      dataType: "json",
      success: function (data) {
        // Populate the cart items
        populateCartItems(data);
      },
      error: function () {
        alert("Error fetching cart items. Please try again later.");
      },
    });
  }

  // Function to populate the cart items
  function populateCartItems(cars) {
    var cartItems = $("#cart-items");
    cartItems.empty(); // Clear the cart items before populating

    $.each(cars, function (index, car) {
      var item = $("<li>").text(
        car.brand_name + " " + car.model_name + " (" + car.car_year + ")"
      );

      var removeButton = $("<button>")
        .text("Remove")
        .addClass("btn btn-danger btn-sm btn-remove-from-cart")
        .attr("data-car-id", car.car_id);

      item.append(removeButton);
      cartItems.append(item);
    });
  }

  // Function to remove a car from the cart
  function removeFromCart(userId, carId) {
    if (confirm("Are you sure you want to remove this car from the cart?")) {
      $.ajax({
        url: "cart.php?user_id=" + userId + "&car_id=" + carId,
        type: "DELETE",
        success: function (data) {
          // Refresh the cart items after successful removal
          getCartItems(userId);
        },
        error: function () {
          alert("Error removing car from cart. Please try again later.");
        },
      });
    }
  }

  // Fetch cart items for the current user on page load
  var userId = $("#user_id").val();
  getCartItems(userId);

  // Add click event handler for Remove from cart button
  $(document).on("click", ".btn-remove-from-cart", function () {
    var carId = $(this).data("car-id");
    removeFromCart(userId, carId);
  });

  // Other functions and event handlers for buying cars, etc. can be added here as needed
});

// Function to handle the "Proceed to buy" button click event
function proceedToBuy(userId, totalPrice) {
  // Check if the cart has items to proceed with buying
  var cartItems = $("#cart-items li");
  if (cartItems.length === 0) {
    alert("Your cart is empty. Please add items before proceeding to buy.");
    return;
  }

  // You can add further logic here, such as displaying a confirmation dialog,
  // initiating a payment process, updating the database, etc.
  // For this example, let's just show an alert with the total price.

  alert("Total Price: $" + totalPrice);

  // If needed, you can redirect the user to a payment page or any other page after buying.
  // Example:
  // window.location.href = "payment.php?user_id=" + userId;
}
