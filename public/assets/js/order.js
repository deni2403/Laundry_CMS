window.document.addEventListener("DOMContentLoaded", function() {
    let totalWeightInput = document.getElementById('totalWeight');
    let serviceSelect = document.getElementById('service');
    let discountSpan = document.querySelector('.diskon span');
    let priceSpan = document.querySelector('.price span');
    let totalPriceSpan = document.querySelector('.total-price span');
    let memberSelect = document.getElementById('member_id');
    let usePointsCheckbox = document.getElementById('use_points');

    
    totalWeightInput.addEventListener('input', updateTotalPrice);
    serviceSelect.addEventListener('change', updateTotalPrice);
    memberSelect.addEventListener('change', updateTotalPrice);
    usePointsCheckbox.addEventListener('change', updateTotalPrice);

    function updateTotalPrice() {
        let selectedService = document.querySelector('#service option:checked');
        let servicePrice = parseFloat(selectedService.getAttribute('data-price'));
        let totalWeight = parseFloat(totalWeightInput.value) || 0;
        let memberPoint = 0;
        let discountedPrice = 0;

        if(!parseInt(memberSelect.options[memberSelect.selectedIndex].text.split(' - ')[1]) ||parseInt(memberSelect.options[memberSelect.selectedIndex].text.split(' - ')[1]) < 100){
            usePointsCheckbox.disabled = true;
            usePointsCheckbox.checked = false;
        } else {
            usePointsCheckbox.disabled = false;
        }

        if (usePointsCheckbox.checked) {
            memberPoint = memberSelect.options[memberSelect.selectedIndex].text.split(' - ')[1] | 0;
            memberPoint = parseInt(memberPoint);
        }

        let discount = memberPoint - (memberPoint % 100);

        if (totalWeight) {
            discountedPrice = (servicePrice * totalWeight) - discount;
        }

        discountedPrice = parseFloat(discountedPrice);

        let formattedDiscon = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        }).format(discount);

        let formattedPrice = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        }).format(servicePrice);
        
        let formattedDiscountedPrice = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR'
        }).format(discountedPrice);

        discountSpan.textContent = formattedDiscon;
        priceSpan.textContent = formattedPrice;
        totalPriceSpan.textContent = formattedDiscountedPrice;
    }
});