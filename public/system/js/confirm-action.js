document.addEventListener("click", function (event) {
    const element = event.target.closest(".js-confirm");

    if (!element) {
        return;
    }

    event.preventDefault();

    const url = element.dataset.url || element.getAttribute("href");

    if (!url) {
        return;
    }

    Swal.fire({
        title: element.dataset.confirmTitle || "Are you sure?",
        text: element.dataset.confirmText || "This action cannot be undone.",
        icon: element.dataset.confirmIcon || "warning",
        showCancelButton: true,
        confirmButtonText: element.dataset.confirmButton || "Yes, continue",
        cancelButtonText: "Cancel",
        confirmButtonColor: element.dataset.confirmColor || "#d33",
        cancelButtonColor: "#6c757d",
        reverseButtons: true
    }).then(function (result) {
        if (!result.isConfirmed) {
            return;
        }

        // For GET links, simply navigate.
        if (!element.dataset.method || element.dataset.method.toUpperCase() === "GET") {
            window.location.href = url;
            return;
        }

        // For POST / PUT / PATCH / DELETE, submit a form.
        const form = document.createElement("form");
        form.method = "POST";
        form.action = url;

        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;

        if (csrfToken) {
            const csrfInput = document.createElement("input");
            csrfInput.type = "hidden";
            csrfInput.name = "_token";
            csrfInput.value = csrfToken;
            form.appendChild(csrfInput);
        }

        const methodInput = document.createElement("input");
        methodInput.type = "hidden";
        methodInput.name = "_method";
        methodInput.value = element.dataset.method.toUpperCase();
        form.appendChild(methodInput);

        document.body.appendChild(form);
        form.submit();
    });
});



{/* <a
    href="{{ route('admin.systemPolicies.edit', $data['policy']) }}"
    class="btn btn-danger js-confirm"
    data-confirm-title="Edit Policy?"
    data-confirm-text="Do you want to continue to the edit page?"
    data-confirm-button="Yes, Edit"
    data-confirm-icon="question"
    data-confirm-color="#3085d6"
>
    <i class="fa-solid fa-pen"></i>
    Edit Policy
</a>

<button
    type="button"
    class="btn btn-danger js-confirm"
    data-url="{{ route('admin.systemPolicies.destroy', $policy) }}"
    data-method="DELETE"
    data-confirm-title="Delete Policy?"
    data-confirm-text="This policy will be permanently deleted."
    data-confirm-button="Yes, Delete"
    data-confirm-icon="warning"
    data-confirm-color="#d33"
>
    <i class="fa-solid fa-trash"></i>
    Delete Policy
</button> */}
