import axios from 'axios';

export const Http = axios.create({
    timeout: 10000,
    headers: {
        'Accept': 'application/json',
        // 'Access-Control-Allow-Origin': '*',
        // 'Access-Control-Allow-Methods': 'POST, GET, OPTIONS, PUT, DELETE',
        // 'Access-Control-Allow-Credentials': false,
        // 'Access-Control-Allow-Headers': 'X-Requested-With,Content-Type,X-Token-Auth,Authorization'
    }
});