import hashlib

def encrypt_password(string):
    sha_signature = \
            hashlib.sha256(string.encode()).hexdigest()
    return sha_signature