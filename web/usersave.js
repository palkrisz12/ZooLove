function saveUser() {
    const email = document.getElementById('imell').value;
    const nev = document.getElementById('fnev').value;
    const password = document.getElementById('psw').value;
    let user = {
        nev,
        password,
        email,
        id: users.length
    }
    users.push(user);
    console.log(users);

}