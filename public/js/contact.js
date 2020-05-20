const contactselector = document.querySelector("#contact");
const companyselector = document.querySelector("#company");
const firstContainer = document.querySelector("#mainContainer");

function clearContact() {
    let allContact = document.querySelectorAll(".companyContact");
    allContact.forEach((element) => {
        contactselector.removeChild(element);
    });
}

function generateContacts(companyId) {
    fetch(
        "http://localhost/" +
            firstContainer.dataset.directory +
            "/public/api/company/" +
            companyId +
            "?api_token=6co2Frg4Sbb73hF56M8Rfa5QChyw1ii7SANSD2c2ttNk4McG9zqATXFu2Pji"
    )
        .then((data) => data.json())
        .then((res) => {
            res.company.contacts.forEach((contact) => {
                let contactOption = document.createElement("option");
                contactOption.value = contact.id;
                contactOption.innerHTML =
                    "<strong>" +
                    contact.fullname +
                    "</strong> - " +
                    contact.jobname;
                contactOption.classList.add("companyContact");
                contactselector.appendChild(contactOption);
            });
        });
}

companyselector.addEventListener("change", function () {
    clearContact();
    generateContacts(this.value);
});
