const productContainer = document.querySelector(".productlist");
const isProductDetailPage = document.querySelector(".product-detail");
const isShoppingCartPage = document.querySelector(".cart");

if (productContainer) {
    displayProducts();
} else if (isProductDetailPage) {
    displayProductDetail();
} else if (isShoppingCartPage) {
    displayShoppingCart();
}

function displayProducts() {
    products.forEach(product => {
        const productCard = document.createElement("div");
        productCard.classList.add("productCard");
        productCard.innerHTML = `
            <div class="img-box">
                <img src="${product.colors[0].mainImage}" alt="${product.title}">
            </div>
            <h2 class="title">${product.title}</h2>
            <span class="price">${product.price}</span>
        `;
        productContainer.appendChild(productCard);

        const imgBox = productCard.querySelector(".img-box");
        imgBox.addEventListener("click", () => {
            sessionStorage.setItem("selectedProduct", JSON.stringify(product));
            window.location.href = "ProductDetails.html";
        });
    });
}

function displayProductDetail() {
    const productData = JSON.parse(sessionStorage.getItem("selectedProduct"));

    const titleEl = document.querySelector(".title");
    const priceEl = document.querySelector(".price");
    const descriptionEl = document.querySelector(".description");
    const mainImageContainer = document.querySelector(".main-img");
    const thumbnailContainer = document.querySelector(".thumbnail-list");
    const colorContainer = document.querySelector(".color-options");
    const sizeContainer = document.querySelector(".size-options");
    const addToCartBtn = document.querySelector("#addToCart");

    let selectedColor = productData.colors[0];
    let selectedSize = selectedColor.sizes[0];

    function updateProductDisplay(colorData) {
        if (!colorData.sizes.includes(selectedSize)) {
            selectedSize = colorData.sizes[0];
        }

        mainImageContainer.innerHTML = `<img src="${colorData.mainImage}">`;

        thumbnailContainer.innerHTML = "";
        const allThumbnails = [colorData.mainImage, ...colorData.thumbnails.slice(0, 3)];
        allThumbnails.forEach(thumb => {
            const img = document.createElement("img");
            img.src = thumb;
            thumbnailContainer.appendChild(img);
            img.addEventListener("click", () => {
                mainImageContainer.innerHTML = `<img src="${thumb}">`;
            });
        });

        colorContainer.innerHTML = "";
        productData.colors.forEach(color => {
            const img = document.createElement("img");
            img.src = color.mainImage;
            if (color.name === colorData.name) img.classList.add("selected");
            colorContainer.appendChild(img);
            img.addEventListener("click", () => {
                selectedColor = color;
                updateProductDisplay(color);
            });
        });

        sizeContainer.innerHTML = "";
        colorData.sizes.forEach(size => {
            const btn = document.createElement("button");
            btn.textContent = size;
            if (size === selectedSize) btn.classList.add("selected");
            sizeContainer.appendChild(btn);
            btn.addEventListener("click", () => {
                document.querySelectorAll(".size-options button").forEach(el => el.classList.remove("selected"));
                btn.classList.add("selected");
                selectedSize = size;
            });
        });
    }

    titleEl.textContent = productData.title;
    priceEl.textContent = "₱341.91"; 
    descriptionEl.textContent = productData.description;

    updateProductDisplay(selectedColor);

    addToCartBtn.addEventListener("click", () => {
        addToCart(productData, selectedColor, selectedSize);
        
    });
}

function addToCart(product, color, size) {
    let cart = JSON.parse(sessionStorage.getItem("cart")) || [];
    const existingItem = cart.find(item => item.id === product.id && item.color === color.name && item.size === size);
    
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        cart.push({
            id: product.id,
            title: product.title,
            price: 341.91,
            image: color.mainImage,
            color: color.name,
            size: size,
            quantity: 1
        });
        showPopupMessage("Item successfully added to cart");
    }

    sessionStorage.setItem("cart", JSON.stringify(cart));
    updateCartBadge();
}



function displayShoppingCart() {
    const cart = JSON.parse(sessionStorage.getItem("cart")) || [];
    const cartItemsContainer = document.querySelector(".hl-items");
    const subtotalEl = document.querySelector(".subtotal");
    const alltotalEl = document.querySelector(".alltotal");

    cartItemsContainer.innerHTML = "";

    if (cart.length === 0) {
        cartItemsContainer.innerHTML = "<p>Your cart is empty.</p>";
        subtotalEl.textContent = "₱0.00";
        alltotalEl.textContent = "₱0.00";
        return;
    }

    let subtotal = 0;

    cart.forEach((item, index) => {
        const itemTotal = item.price * item.quantity;
        subtotal += itemTotal;

        const cartItem = document.createElement("div");
        cartItem.classList.add("hl-item");
        cartItem.innerHTML = `
            <div class="product">
                <img src="${item.image}" alt="${item.title}">
                <div class="item-detail">
                    <p>${item.title}</p>
                    <div class="sizencolorvariety">
                        <span class="size">${item.size}</span>
                    </div>
                </div>
            </div>
            <div class="quantity"><input type="number" value="${item.quantity}" min="1" data-index="${index}"></div>
            <span class="price">₱${item.price.toFixed(2)}</span>
            <span class="total">₱${itemTotal.toFixed(2)}</span>
            <button class="remove" data-index="${index}"><i class="ri-close-circle-fill"></i></button>
        `;
        cartItemsContainer.appendChild(cartItem);
    });

    subtotalEl.textContent = `₱${subtotal.toFixed(2)}`;
    alltotalEl.textContent = `₱${subtotal.toFixed(2)}`;

    removeShoppingCartItem();
    updateShoppingCartQuantity();
}

function removeShoppingCartItem() {
    document.querySelectorAll(".remove").forEach(button => {
        button.addEventListener("click", function () {
            let cart = JSON.parse(sessionStorage.getItem("cart")) || [];
            const index = this.getAttribute("data-index");
            cart.splice(index, 1);
            sessionStorage.setItem("cart", JSON.stringify(cart));

            showPopupMessage("Item successfully removed!");

            displayShoppingCart();
            updateCartBadge();
        });
    });
}

function showPopupMessage(message) {
    const popup = document.getElementById("popupMessage");
    popup.textContent = message;
    popup.classList.add("show");

    setTimeout(() => {
        popup.classList.remove("show");
    }, 2000);
}


function updateShoppingCartQuantity() {
    document.querySelectorAll(".quantity input").forEach(input => {
        input.addEventListener("change", function () {
            let cart = JSON.parse(sessionStorage.getItem("cart")) || [];
            const index = this.getAttribute("data-index");
            cart[index].quantity = parseInt(this.value);
            sessionStorage.setItem("cart", JSON.stringify(cart));
            displayShoppingCart();
            updateCartBadge();
        });
    });
}

function updateCartBadge() {
    const cart = JSON.parse(sessionStorage.getItem("cart")) || [];
    const cartCount = cart.reduce((total, item) => total + item.quantity, 0);
    const cartbadge = document.querySelector(".cart-count");
    if (cartbadge) {
        if (cartCount > 0) {
            cartbadge.textContent = cartCount;
            cartbadge.style.display = "block";
        } else {
            cartbadge.style.display = "none";
        }
    }
}

updateCartBadge();
