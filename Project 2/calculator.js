function calculateRate() {
    const packageWeight = document.getElementById("package-weight").value;
    const packageWidth = document.getElementById("package-width").value;
    const packageHeight = document.getElementById("package-height").value;
    const packageLength = document.getElementById("package-length").value;
    const destination = document.getElementById("destination").value;
    const shippingMethod = document.getElementById("shipping-method").value;

    const baseRate =
        packageWeight * 0.5 +
        Math.max(packageWidth, packageLength, packageHeight) * 0.3;

    let rate = baseRate;

    if (destination === "international") {
        rate += baseRate * 0.2;
    }

    if (shippingMethod === "air") {
        rate += baseRate * 0.15;
    } else if (shippingMethod === "express") {
        rate += baseRate * 0.1;
    }

    document.getElementById("rate").innerText = `Estimated Shipping Rate: $${rate.toFixed(2)}`;
}

function resetForm() {
    document.getElementById("package-weight").value = "";
    document.getElementById("package-width").value = "";
    document.getElementById("package-height").value = "";
    document.getElementById("package-length").value = "";
    document.getElementById("destination").value = "domestic";
    document.getElementById("shipping-method").value = "ground";
    document.getElementById("rate").innerText = "";
}