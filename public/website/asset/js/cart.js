// Cart State
let cart = JSON.parse(localStorage.getItem('qwaiting_cart')) || [];
const KEYPAD_PRICE = 300; // Price per keypad

// Initialize on load
document.addEventListener('DOMContentLoaded', () => {
    // If we have items in cart, update the keypad input if present
    const keypadItem = cart.find(item => item.id === 'keypad');
    if (keypadItem) {
        const input = document.getElementById('keypadQuantity');
        if (input) input.value = keypadItem.quantity;
    }
    updateCartDisplay();
});

// Update Cart Display
function updateCartDisplay() {
    const emptyCart = document.getElementById('emptyCart');
    const cartItems = document.getElementById('cartItems');
    const cartSummary = document.getElementById('cartSummary');
    const cartCount = document.getElementById('cartCount');
    const subtotalAmount = document.getElementById('subtotalAmount');

    // Save to localStorage
    localStorage.setItem('qwaiting_cart', JSON.stringify(cart));

    if (cart.length === 0) {
        if (emptyCart) emptyCart.classList.remove('hidden');
        if (cartItems) cartItems.classList.add('hidden');
        if (cartSummary) cartSummary.classList.add('hidden');
        if (cartCount) cartCount.classList.add('hidden');
    } else {
        if (emptyCart) emptyCart.classList.add('hidden');
        if (cartItems) cartItems.classList.remove('hidden');
        if (cartSummary) cartSummary.classList.remove('hidden');
        if (cartCount) cartCount.classList.remove('hidden');

        // Update cart count
        const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
        if (cartCount) cartCount.textContent = totalItems;

        // Update cart items
        if (cartItems) {
            cartItems.innerHTML = cart.map(item => `
                <div class="flex items-start gap-4 p-4 bg-gray-50 rounded-xl">
                    <div class="flex-shrink-0 w-12 h-12 bg-white rounded-lg border border-gray-200 flex items-center justify-center">
                        <svg class="w-6 h-6 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h4 class="font-semibold text-gray-900">${item.name} ${item.quantity}</h4>
                        <p class="text-sm text-gray-500">Quantity: ${item.quantity}</p>
                    </div>
                    <div class="text-right">
                        <p class="font-bold text-gray-900">$${item.price * item.quantity}</p>
                        <button onclick="removeFromCart('${item.id}')" class="text-red-500 hover:text-red-700 mt-1">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            `).join('');
        }

        // Update subtotal
        const subtotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
        if (subtotalAmount) subtotalAmount.textContent = `$${subtotal}`;
    }
}

// Proceed to Checkout
function checkout() {
    window.location.href = '/products/product_details';
}

// Add to Cart
function addToCart(item) {
    const existingItem = cart.find(i => i.id === item.id);
    if (existingItem) {
        existingItem.quantity = item.quantity;
    } else {
        cart.push(item);
    }
    updateCartDisplay();
}

// Remove from Cart
function removeFromCart(itemId) {
    cart = cart.filter(item => item.id !== itemId);

    // Reset quantity input if it's the keypad
    if (itemId === 'keypad') {
        const input = document.getElementById('keypadQuantity');
        if (input) input.value = 0;
    }

    updateCartDisplay();
}

// Quantity Selector Functions
function incrementQuantity() {
    const input = document.getElementById('keypadQuantity');
    const currentValue = parseInt(input.value) || 0;
    input.value = currentValue + 1;
    updateCartFromQuantity();
}

function decrementQuantity() {
    const input = document.getElementById('keypadQuantity');
    const currentValue = parseInt(input.value) || 0;
    if (currentValue > 0) {
        input.value = currentValue - 1;
        updateCartFromQuantity();
    }
}

// Update cart when quantity changes
function updateCartFromQuantity() {
    const input = document.getElementById('keypadQuantity');
    const quantity = parseInt(input.value) || 0;

    if (quantity > 0) {
        addToCart({
            id: 'keypad',
            name: 'keypad',
            price: KEYPAD_PRICE,
            quantity: quantity
        });
    } else {
        removeFromCart('keypad');
    }
}


// Cart Toggle Function
function toggleCart() {
    const cartSidebar = document.getElementById('cartSidebar');
    if (cartSidebar) cartSidebar.classList.toggle('translate-x-full');
}
