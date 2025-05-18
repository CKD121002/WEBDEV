const products = [
      {
        id: 1,
        title: "HILEE (Pear) Premium Flask Hydration",
        price: "PHP 341.91",
        description: "Warming Time: 7-12 Hours Cooling Time: 12-24 Hours  Style: Classic Material: Stainless Steel Feature: Leak-proof, Heat Resistant, Anti-Scalding Volume: 20oz-43oz Quantity Per Pack: 1",
        colors: [
          {
            name:"Pear",
            mainImage: "../../imgs/pe-ar.png",
            thumbnails: [
              "../../imgs/pearstand.png",
              "../../imgs/Cold&Hot_Pear.png",
              "../../imgs/fourfruit.jpg"
            ],
            sizes: ["20oz", "27oz", "33oz", "43oz"],
          }
        ]
      },
      {
        id: 2,
        title: "HILEE (Wax Apple) Premium Flask Hydration",
        price: "PHP 341.91",
        description: "Warming Time: 7-12 Hours Cooling Time: 12-24 Hours  Style: Classic Material: Stainless Steel Feature: Leak-proof, Heat Resistant, Anti-Scalding Volume: 20oz-43oz Quantity Per Pack: 1",
        colors: [
          {
            name:"Wax Apple",
            mainImage: "../../imgs/wax-apple.png",
            thumbnails: [
              "../../imgs/waxapplestand.png",
              "../../imgs/Cold&Hot_Wax.png",
              "../../imgs/fourfruit.jpg"
            ],
            sizes: ["20oz", "27oz", "33oz", "43oz"],
          }
        ]
      },
      {
        id: 3,
        title: "HILEE (Pineapple) Premium Flask Hydration",
        price: "PHP 341.91",
        description: "Warming Time: 7-12 Hours Cooling Time: 12-24 Hours  Style: Classic Material: Stainless Steel Feature: Leak-proof, Heat Resistant, Anti-Scalding Volume: 20oz-43oz Quantity Per Pack: 1",
        colors: [
          {
            name:"Pineapple",
            mainImage: "../../imgs/pine-apple.png",
            thumbnails: [
              "../../imgs/pineapplestand.png",
              "../../imgs/Cold&Hot_Pine.png",
              "../../imgs/fourfruit.jpg"
            ],
            sizes: ["20oz", "27oz", "33oz", "43oz"],
          }
        ]
      },
      {
        id: 4,
        title: "HILEE (Green Apple) Premium Flask Hydration",
        price: "PHP 341.91",
        description: "Warming Time: 7-12 Hours Cooling Time: 12-24 Hours  Style: Classic Material: Stainless Steel Feature: Leak-proof, Heat Resistant, Anti-Scalding Volume: 20oz-43oz Quantity Per Pack: 1",
        colors: [
          {
            name:"Green Apple",
            mainImage: "../../imgs/green-apple.png",
            thumbnails: [
              "../../imgs/greenapplestand.jpg",
              "../../imgs/Cold&Hot_Green.png",
              "../../imgs/fourfruit.jpg"
            ],
            sizes: ["20oz", "27oz", "33oz", "43oz"],
          }
        ]
      }
    ];
  
    console.log('products (direct):', typeof products); // Check immediately after definition
  
    function getQueryParam(name) {
      const urlParams = new URLSearchParams(window.location.search);
      return urlParams.get(name);
    }
  
    const colorName = getQueryParam('product');
    console.log('Color Name from URL:', colorName);
  
    if (colorName) {
      let foundProduct = null;
      let foundColor = null;
  
      if (products) {
        for (const product of products) {
          const color = product.colors.find(c => c.name.toLowerCase() === colorName.toLowerCase());
          if (color) {
            foundProduct = product;
            foundColor = color;
            break;
          }
        }
  
        console.log('Found Product:', foundProduct);
        console.log('Found Color:', foundColor);
  
        const mainImageElement = document.querySelector('.main-img');
        const titleElement = document.querySelector('.product-info .title');
        const priceElement = document.querySelector('.product-info .price');
        const descriptionElement = document.querySelector('.product-info .description');
        const thumbnailList = document.querySelector('.thumbnail-list');
        const sizeOptions = document.querySelector('.size-options');
        const colorOptions = document.querySelector('.color-options');
  
        if (mainImageElement) {
          mainImageElement.innerHTML = `<img src="${foundColor.mainImage}" alt="${foundColor.name}">`;
        }
        if (titleElement) {
          titleElement.textContent = foundProduct.title;
        }
        if (priceElement) {
          priceElement.textContent = foundProduct.price;
        }
        if (descriptionElement) {
          descriptionElement.textContent = foundProduct.description;
        }
  
        if (foundColor.thumbnails && thumbnailList) {
          thumbnailList.innerHTML = foundColor.thumbnails.map(thumb => `<img src="${thumb}" alt="thumbnail">`).join('');
        }
  
        if (foundColor.sizes && sizeOptions) {
          sizeOptions.innerHTML = foundColor.sizes.map(size => `<button class="button-size">${size}</button>`).join('');
        }
  
        if (foundProduct.colors && colorOptions) {
          colorOptions.innerHTML = foundProduct.colors.map(color => `<img src="${color.mainImage}" alt="${color.name}" class="${color.name.toLowerCase() === colorName.toLowerCase() ? 'selected' : ''}">`).join('');
        }
  
      } else {
        console.error('products array is not defined!');
        const titleElement = document.querySelector('.product-info .title');
        if (titleElement) {
          titleElement.textContent = 'Error loading product data.';
        }
      }
    } else {
      const titleElement = document.querySelector('.product-info .title');
      if (titleElement) {
        titleElement.textContent = 'No Product Selected';
      }
    }