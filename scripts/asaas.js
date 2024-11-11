/* CLIENTES */

function buscaCli(){
    const myRequest = new Request("backend/asaas/buscaCliente.php",{
        method : "POST"
    }) 

    return fetch(myRequest)
}

function newCli(body){
    const data = new URLSearchParams()
        data.append("body", JSON.stringify(body))

    const myRequest = new Request("backend/asaas/novoCliente.php",{
        method : "POST",
        body : data
    })    
    
    return fetch(myRequest)
}

function edtCli(cust,body){
    const data = new URLSearchParams()
        data.append("body", JSON.stringify(body))
        data.append("cust", cust.id)

    const myRequest = new Request("backend/asaas/edtCliente.php",{
        method : "POST",
        body : data
    })    
    
    return fetch(myRequest)
}

function delCli(cust){
    if(confirm('Deseja deletar este Cliente?')){
        const data = new URLSearchParams()
            data.append("cust", cust.id)

        const myRequest = new Request("backend/asaas/delCliente.php",{
            method : "POST",
            body : data
        })    
        
        return fetch(myRequest)
    }
}

/* CONTA CORRENTE */

function extrato(){
    const myRequest = new Request("backend/asaas/extrato.php",{
        method : "POST"
    }) 

    return fetch(myRequest)

}

/* COBRANÇAS */

function buscaCob(){
    const myRequest = new Request("backend/asaas/buscaCobranca.php",{
        method : "POST"
    }) 

    return fetch(myRequest)
}

function newCob(body){
    const data = new URLSearchParams()
        data.append("body", JSON.stringify(body))

    const myRequest = new Request("backend/asaas/novaCobranca.php",{
        method : "POST",
        body : data
    })    
    
    return fetch(myRequest)
}