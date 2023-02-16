function saveUser()
{
    const email = document.getElementById('email').value;
    if (checkAvailability(email)) { const nev = document.getElementById('nev').value;
        const kor = document.getElementById('kor').value;
        let user = {
            nev,
            kor,
            email,
            date: new Date(),
            id: users.length
        }
        users.push(user);
        console.log(users);
    }
}function checkAvailability(email){
    let user;
    for (user of users) {
        if (user.email === email) {
            alert("Az email cim mar foglalt!");
            return false;
        }
    }
    return true;}