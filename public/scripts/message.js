export default class Message {
    body = document.querySelector('body')
    alertDiv = document.createElement('div');
    constructor(){
        this.alertDiv.classList.add('alert');
        this.alertDiv.innerHTML="<h1>Hello</h1>"
        this.body.append(this.alertDiv)
    }
    send(type, text){
        const className = 'alert-'+type;
        this.alertDiv.classList.add(className);
        this.alertDiv.classList.add('showAlert');
        this.alertDiv.innerHTML=text;
        setTimeout(()=>{
            this.alertDiv.classList.remove('showAlert');
            setTimeout(()=>{
                this.alertDiv.classList.remove(className);
                this.alertDiv.innerHTML='';
            },300)
        }, 3000)
    }
}
