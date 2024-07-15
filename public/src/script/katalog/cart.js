document.addEventListener("DOMContentLoaded", function () {
    const tambahkanKeKeranjangButtons = document.querySelectorAll('.tambahkan-ke-keranjang');
    const jumlahKeranjangBadge = document.getElementById('jumlah-keranjang');
    const keranjangDataInput = document.getElementById('keranjang-data');
    let jumlahBarangKeranjang = 0;
    let keranjang = [];

    tambahkanKeKeranjangButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            const productId = button.getAttribute('data-product-id');
            const productName = button.getAttribute('data-product-name');
            const productQty = parseInt(button.getAttribute('data-product-qty'));
            const stockQty = parseInt(button.getAttribute('data-product-stok'));

            tambahkanKeKeranjang(productId, productName, productQty);
            jumlahBarangKeranjang += productQty;
            updateJumlahKeranjang(jumlahBarangKeranjang);
            updateKeranjangDataInput();
            updateStock(productId, productQty, stockQty);
        });
    });

    function tambahkanKeKeranjang(productId, productName, productQty) {
        const cartList = document.querySelector('.cart-list');
        const listItem = document.createElement('li');
        listItem.className = 'list-group-item d-flex justify-content-between align-items-center d-block';

        // Check if product is already in cart
        let productIndex = keranjang.findIndex(item => item.id === productId);
        if (productIndex !== -1) {
            keranjang[productIndex].qty += productQty;
            const listUpdate = document.getElementById('list'+productId);
            console.log(keranjang[productIndex].qty+1, listUpdate);
            listUpdate.value = keranjang[productIndex].qty;
        } else {
            // Content for the list item
            listItem.innerHTML = `
                <span>${productName}</span>
                <div class="d-flex align-items-center">
                    <div class="col">
                        <input type="number" class="form-control product-quantity" id="list${productId}" style="width: 80px;" value="${productQty}" aria-label="Quantity" aria-describedby="basic-addon1">
                    </div>
                    <div class="col">
                        <button class="btn btn-danger btn-sm btn-kurang">-</button>
                    </div>
                </div>
            `;

            cartList.appendChild(listItem);

            // Add event listener to the newly created "-" button
            const btnKurang = listItem.querySelector('.btn-kurang');
            btnKurang.addEventListener('click', function () {
                const quantityInput = listItem.querySelector('.product-quantity');
                let currentQty = parseInt(quantityInput.value);
                if (currentQty > 0) {
                    currentQty--;
                    quantityInput.value = currentQty;
                    jumlahBarangKeranjang--;
                    updateJumlahKeranjang(jumlahBarangKeranjang);
                    updateKeranjangDataInput();
                }
                if (currentQty === 0) {
                    // Remove the list item from the DOM if quantity becomes 0
                    cartList.removeChild(listItem);
                    keranjang = keranjang.filter(item => item.id !== productId);
                    updateKeranjangDataInput();
                }
            });
            keranjang.push({ id: productId, name: productName, qty: productQty });
        }
    }

    function updateJumlahKeranjang(jumlah) {
        jumlahKeranjangBadge.textContent = jumlah;
    }

    function updateKeranjangDataInput() {
        keranjangDataInput.value = JSON.stringify(keranjang);
    }

    function updateStock(productId, productQty, stockQty) {
        const lastStock = stockQty - productQty;
        const textStock = document.getElementById('stok-' + productId);
        const buttonAdd = document.getElementById('button-tambah-' + productId);
        const avalBadge = document.getElementById('aval-' + productId);

        buttonAdd.setAttribute('data-product-stok', lastStock);
        updateTextStock(textStock, lastStock);
        disableZeroStock(lastStock, buttonAdd, avalBadge);
    }

    function updateTextStock(textStock, lastStock) {
        textStock.textContent = "Stok: " + lastStock;
    }

    function disableZeroStock(lastStock, buttonAdd, avalBadge) {
        if (lastStock == 0) {
            buttonAdd.removeAttribute('class');
            buttonAdd.className = "btn text-danger btn-block border-0 font-weight-bold";
            buttonAdd.textContent = "Barang Habis!";

            avalBadge.removeAttribute('class');
            avalBadge.className = "bg-danger px-2 rounded";
            avalBadge.textContent = "Tidak Tersedia";
        }
    }
});
