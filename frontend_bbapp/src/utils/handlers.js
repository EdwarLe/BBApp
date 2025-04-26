export const postData = async (payload, dataStore, endpoint, nameModal, loadDataWrapper, closeModalWrapper, refreshTableWrapper) => {
    if (payload.type === nameModal) {
        console.log('Componente: Intentando crear usuario con datos:', payload.data);
        const createdItem = await dataStore.createData(endpoint, payload.data);
        if (createdItem) {
            console.log('Componente: Usuario creado exitosamente:', createdItem);
            alert(`${nameModal} agregado correctamente!`);
            await loadDataWrapper();
            closeModalWrapper();
            refreshTableWrapper();
        }

        else {
            alert(`Error al guardar ${nameModal}. Revisa la consola para más detalles.`);
        }
    }
}

export const putData = async (payload, dataStore, endpoint, nameModal, loadDataWrapper, closeModalWrapper, refreshTableWrapper) => {

    console.log('Componente: Intentando actualizar usuario con datos:', payload.data);
    const updatedUser = await dataStore.updateData(endpoint, payload.data, payload.id);
    if (updatedUser) {
        console.log('Componente: Usuario actualizado exitosamente:', updatedUser);
        alert(`${nameModal} actualizado correctamente!`);
        await loadDataWrapper();
        closeModalWrapper();
        refreshTableWrapper();
    }

    else {
        alert(`Error al guardar ${nameModal}. Revisa la consola para más detalles.`);
    }

}

export const deleteData = async (payload, dataStore, endpoint, nameModal, loadDataWrapper, closeModalWrapper, refreshTableWrapper) => {
    console.log(payload)
    console.log('Componente: Intentando eliminar usuario con id:', payload.id);
    confirm(`¿Está seguro de que desea eliminar al usuario ${payload.name}?`)
    const deletedUser = await dataStore.deleteData(endpoint, payload.id);
    if (deletedUser) {
        console.log('Componente: Usuario eliminado exitosamente:', deletedUser);
        alert(`${nameModal} eliminado correctamente!`);
        await loadDataWrapper();
        closeModalWrapper();
        refreshTableWrapper();
    }

    else {
        alert(`Error al eliminar ${nameModal}. Revisa la consola para más detalles.`);
    }
}

export const loadData = async (dataStore, endpoint, users) => {
    const fetchedData = await dataStore.fetchData(endpoint);
    if (fetchedData) {
        users.value = fetchedData;
        console.log('Usuarios cargados en el componente:', users.value);
    } else {
        console.error('Error al cargar usuarios en el componente.');
        users.value = [];
    }

};

export const forceTableRefresh = (key) => {
    key.value += 1;
}