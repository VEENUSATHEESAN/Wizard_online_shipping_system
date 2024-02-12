const trackingEvents = [
    { number: "1234567890", status: "Shipment picked up" },
    { number: "0987654321", status: "Out for delivery" },
    // Add more tracking events here
];

function trackPackage() {
    const trackingNumber = document.getElementById("tracking-number").value;
    let matchingEvent = trackingEvents.find(event => event.number === trackingNumber);

    if (matchingEvent) {
        document.getElementById("package-status").innerText = `Package status for tracking number ${trackingNumber}: ${matchingEvent.status}`;
    } else {
        document.getElementById("package-status").innerText = `No matching package found for tracking number ${trackingNumber}`;
    }
}