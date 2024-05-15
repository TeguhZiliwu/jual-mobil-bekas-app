const extend = (obj, ext) => {
    Object.keys(ext).forEach(function (key) {
        obj[key] = ext[key];
    });
    return obj;
};

const windowOnResize = () => {

    // const tabs = new bootstrap.Tab($('[data-bs-toggle="tab"]'));
    // tabs.addEventListener('shown.bs.tab', function (event) {
    //     window.setTimeout(function () {
    //         $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
    //     }, 300);
    // });
    
    window.setTimeout(function () {
        if ($.fn.dataTable.isDataTable('table')) {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
        }
    }, 300);
};

export { extend, windowOnResize };