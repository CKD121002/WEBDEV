const productContainer = document.querySelector(".productlist");
const isProductDetailPage = document.querySelector(".product-detail")
const isShoppingCartPage = document.querySelector(".shoppingcart");

if (productContainer) {
    displayProducts(); 
} else if (isProductDetailPage){
    displayProductDetail();
} else if (isShoppingCartPage){
    displayShoppingCart();
}

function displayProducts() {
    products.forEach(product => {
        const productCard = document.createElement("div");
        productCard.classList.add("productCard");
        productCard.innerHTML = `
            <div class="img-box">
                <img src="${product.colors[0].mainImage}">
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
    const addToCart = document.querySelector("#add-to-cart-button");

    let selectedColor = productData.colors[0];
    let selectedSize = selectedColor.sizes[0];

    function updateProductDisplay(colorData) {

        if (!colorData.sizes.includes(selectedSize)) {
            selectedSize = colorData.sizes[0];
        }

        mainImageContainer.innerHTML = `<img src="${colorData.mainImage}">`;
       
        thumbnailContainer.innerHTML = "";
        const allThumbnails = [colorData.mainImage].concat(colorData.thumbnails.slice(0, 3));
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
    priceEl.textContent = productData.price;
    descriptionEl.textContent = productData.description;

    updateProductDisplay(selectedColor);

    addToCart.addEventListener("click", () => {
        addToCart(productData, selectedColor, selectedSize);
    });
}
let btnback = document.querySelector(".back");

btnback.addEventListener("click", () => {
    window.history.back();
})

function addToCart(product, color, size) {
    
    let cart = JSON.parse(sessionStorage.getItem("shoppingcart")) || [];
    const existingItem = cart.find(item => item.id === product.id && item.color === color.name && item.size === size);
    


if (existingItem) {
    existingItem.quantity += 1;
    
} else {
    
    cart.push({
    
    id: product.id,
    title: product.title,
    price: product.price,
    image: color.mainImage,
    color: color.name,
    size: size,
    quantity: 1
    
});

}; 
sessionStorage.setItem("shoppingcart",JSON.stringify(cart));

updateCartBadge();

}


function displayShoppingCart(){
    const shoppingcart = JSON.parse(sessionStorage.getItem("shoppingcart")) || []; 

    const shoppingcartItemsContainer = document.querySelector(".hl-items"); 
    const subtotalEl = document.querySelector(".subtotal"); 
    const alltotalEl = document.querySelector(".alltotal"); 

    shoppingcartItemsContainer.innerHTML = "";

    if (shoppingcart.length === 0)  {
    shoppingcartItemsContainer.innerHTML = "<p>Your cart is empty.</p>"; 
    subtotalEl.textContent = "₱ 0.00"; 
    alltotalEl.textContent = "₱ 0.00"; 
    return; 
 }

    let subtotal = 0;

  shoppingcart.forEach((item, index) => {
    const itemTotal = parseFloat(item.price.replace("₱","")) * item.quantity;
    subtotal += itemTotal;

    const shoppingcartItem = document.createElement("div"); 
    shoppingcartItem.classList.add("hl-item"); 
    shoppingcartItem.innerHTML = `
 <div class="hl-item">

 <div class="product">
        <img src="${item.mainImage}">
        <div class="item-detail">
            <p>${item.title}</p>
            <div class="sizencolorvariety">
                <span class="size">${item.size}</span>
    
            </div>
        </div>
    </div>



<div class="quantity"><input type="number" value="${item.quantity}" min="1" data-index="${index}"></div>
    <span class="price">${item.price}</span>
    <span class="total">${itemTotal.toFixed(2)}</span>
    <button class="remove" data-index="${index}"><i class="ri-close-circle-fill"></i></button>


   `;
    shoppingcartItemsContainer.appendChild(shoppingcartItem); 
    
    }); 

    subtotalEl.textContent = `₱${subtotal.toFixed(2)}`;
    alltotalEl.textContent = `₱${subtotal.toFixed(2)}`;

        removeShoppingCartItem();
        updateShoppingCartQuantity();
}

    function removeShoppingCartItem() { 
       document.querySelectorAll(".remove").forEach(button => { 
       button.addEventListener("click", function () { 
       let shoppingcart = JSON.parse(sessionStorage.getItem("shoppingcart")) || []; 

   const index = this.getAttribute("data-index"); 

   shoppingcart.splice(index, 1); 
   sessionStorage.setItem("shoppingcart", JSON.stringify(shoppingcart)); 
   displayShoppingCart(); 
   updateCartBadge();
     }); 
   }); 
 }

function updateShoppingCartQuantity() { 
document.querySelectorAll(".quantity input").forEach(input => {
input.addEventListener("change", function () { 

    let shoppingcart = JSON.parse(sessionStorage.getItem("shoppingcart")) || []; 
    const index = this.getAttribute("data-index"); 
shoppingcart[index].quantity = parseInt(this.value); 
sessionStorage.setItem("shoppingcart", JSON.stringify(shoppingcart)); 
displayShoppingCart();  
updateCartBadge();

}); 
}); 
}

function updateCartBadge() { 
    const shoppingcart = JSON.parse(sessionStorage.getItem("shoppingcart")) || [];
    const shoppingcartCount = shoppingcart.reduce ((total, item) => total + item.quantity,0); 
    const cartbadge = document.querySelector(".cart-count"); 
   
    if (cartbadge) { 
    
    if (shoppingcartCount > 0) {
    
    cartbadge.textContent = shoppingcartCount; 
    cartbadge.style.display = "block"; 
    } else { 
    cartbadge.style.display = "none"; 

}
}
}

updateCartBadge();