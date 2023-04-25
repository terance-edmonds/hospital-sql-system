// employee

function handleOnEmployeeCategory(e, prefix) {
    let container_1 = document.getElementById(`${prefix}-medical-roles`)
    let container_2 = document.getElementById(`${prefix}-nonmedical-roles`)

    if (e.target.value == "Medical") {
        if (container_1) container_1.dataset.active = "true"
        if (container_1) container_1.disabled = false

        if (container_2) container_2.dataset.active = "false"
        if (container_2) container_1.disabled = true
    } else {
        if (container_1) container_1.dataset.active = "false"
        if (container_1) container_1.disabled = true

        if (container_2) container_2.dataset.active = "true"
        if (container_2) container_2.disabled = false
    }
}