const deleteForms =document.querySelectorAll('.delete-form');
deleteForms.forEach(form=>{
    form.addEventListener('submit',e=>{
        e.preventDefault();
        const hasConfirmed = confirm('Sei sicuro di voler Eliminare questo Progetto?');
        if(hasConfirmed) form.submit();
    });
})