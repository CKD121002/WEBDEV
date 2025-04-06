const productContainer = document.querySelector(".product-list");
const isProductDetailPage = document.querySelector(".productlist");
const isShoppingCartPage = document.querySelector(".ShoppingCart");

if (productContainer){
    displayProducts(); 
} else if (isProductDetailPage){
    displayProductDetail();
} else if (isShoppingCartPage){
    displayShoppingCart();
}
function displayProducts(){
    products.forEach(product => {
        const productCard = document.createElement("div");
        productCard.classList.add("product-card");
        productCard.innerHTML = `
        <div class="img-box">
            <img src="${product.colors[0].mainimage}">
        </div>
        <h2 class="title">${product.title}</h2>
        <span class="price">${product.price}</span>
        `;
    productContainer.appendChild(productCard);
    const imgBox = productcard.querySelector(".img-box");
    imgBox.addEventListener("click", () => {
        sessionStorage.setItem("selectedProduct", JSON.stringify(product));
        window.location.href = "Productdetails.html";
    });
});
}

function displayProductDetail(){
    const productData = JSON.parse(sessionStorage.getItem("selected"));

    const titleEl = document.querySelector(".title");
    const priceEl = document.querySelector(".price");
    const descriptionEl = document.querySelector(".description");
    const mainImageContainer = document.querySelector(".main-img");
    const thumbnailContainer = document.querySelector(".thumbnail-list");
    const colorContainer = document.querySelector(".color-options");
    const sizeContainer = document.querySelector(".size-options");
    const addToCartBtn = document.querySelector(".#add-cart-btn");

let selectedColor = product.Data.colors[0];
let selectedSize = selectedColor.sizes[0];

function updateProductDisplay(colorData){
     if (!colorData.sizes.includes(selectedSize)){
        selectedSize = colorData.sizes[0];

 mainImageContainer.innerHTML ='<img src = "$(colorData.mainImage)">';

 thumbnailContainer.innerHTML = "";
 const allThumbnails = [colorData.mainImage].concat(colorData.thumbnails.slice(0,3));
 allThumbnails.forEach(thumb =>{
    const img = document.createElement("img");
   img.src = thumb;

   thumbnailContainer.appendChild(img);

   img.addEventListener("click",()=>{
    mainImageContainer.innerHTML = '<img src="${thumb}"';

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
    btn.textContent size;''

    if (size === selectedSize) btn.classList.add("selected");

    sizeContainer.appendChild(btn);

   btn.addEventListener("click", () => {
    document.querySelectorAll(".size-options button").forEach(el => el.classlist.remove("selected"));
    btn.classList.add("selected");

  selectedSize = size;

});

});

titleEl.textContent productData.title;
priceEl.textContent = productData.price;
descriptionEl.textContent productData.description;

updateProductDisplay(selectedColor);

addToCartBtn.addEventListener("click", () => {
    addToCart(productData, selectedColor, selectedSize);
        
});
}
    
function addToCart(product, color, size) {
    
    let cart = JSON.parse(sessionStorage.getItem("cart")) || [];
    const existingItem = cart.find(item => item.id === product.id & item.color === color.name && item.size === size);
    
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
}
    
sessionStorage.setItem("cart",JSON.stringify(cart));

updateCartBadge();

function displayCart() {
    const cart = JSON.parse(sessionStorage.getItem("cart")) || []; 
    const cartItemsContainer = document.querySelector(".hl-items"); 
    const subtotalEl = document.querySelector(".sub"); 
    const allTotalEl = document.querySelector(".all-total"); 
    cartItemsContainer.innerHTML 

    if (cart.length === 0)  
    cartItemsContainer.innerHTML = "<p>Your cart is empty.</p>"; 
    subtotalEl.textContent = "$0"; 
    allTotalEl.textContent = "$0"; 
    return; 
 }
    let subtotal = 0;

  cart.forEach((item,index) =>{
    const itemTotal = parseFloat(item.price.replace("$"."")) * item.quantity;
    subtotal += itemTotal;

    const cartItem = document.createElement("div"); 
    cartItem.classList.add("hl-items"); 
    cartItem.innerHTML = `
 <div class="product">
        <img src="${item.image}">
        <div class="itemdetail">
            <p>${item.title}"</p>
            <div class="sizencolorvariety">
                <span class="color">${item.color}"</span>
                <span class="size">${item.size}"</span>
            </div>
        </div>
    </div>

<div class = "quantity">
    <input type="number" value="${item.quantity}"" min="1" data-index="${index}"" ></div>
    <span class="price">${item.price}"</span>
    <span class="total">${item.total}"</span>
    <button class="remove" data-index="${index}""><i class="ri-close-line"></i>x</button>

   `;
    cartItemsContainer.appendChild(cartItem); 
    
    }); 

    subtotalEl.textContent = '${subtotal.toFixed(2)}';
    totalEl.textContent = '${subtotal.toFixed(2)}';

        removeCartItem();
        updateCartQuantity();
}

    function removeCartItem() { 
       document.querySelectorAll(".remove").forEach(button => { 
       button.addEventListener("click", function () { 
       let cart = JSON.parse(sessionStorage.getItem("cart")) || []; 

   const index = this.getAttribute("data-index"); 
   cart.splice(index, 1); 
   sessionStorage.setItem("cart", JSON.stringify(cart)); 
   displayCart(); 
   updateCartBadge();
    }); 
    }); 

function updateCartQuantity() { 
document.querySelectorAll(".quantity input").forEach(input => {
input.addEventListener("change", function () { 

let cart = JSON.parse(sessionStorage.getItem("cart")) || []; 
const index = this.getAttribute("data-index"); 
cart[index].quantity = parseInt(this.value); 
sessionStorage.setItem("cart", JSON.stringify(cart)); 
displayCart();  
updateCartBadge();

}); 
}); 

function updateCartBadge() { 
    const cart = JSON.parse(sessionStorage.getItem("cart")) || 
    const cartCount = cart.reduce((total, item) total item.quantity, 0); 
    const badge = document.querySelector(".cart-item-count"); 
   
    if (badge) { 
    
    if (cartCount > 0) {
    
    badge.textContent cartCount; 
    badge.style.display = "block"; 
    }else { 
    badge.style.display "none"; 
    } 
}
}
    updateCartBadge(); 