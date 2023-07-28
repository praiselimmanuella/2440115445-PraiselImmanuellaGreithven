from typing import Union

from fastapi import FastAPI

import uvicorn

app = FastAPI()

umkm = [
    {
        "id_umkm" : 1,
        "nama_umkm": "Toko A",
        "desc_umkm": "Deskripsi Toko A",
        "alamat_umkm": "Alamat Toko A",
        "kelompok_umkm": "Kelompok A" 
    },
    {
        "id_umkm" : 2,
        "nama_umkm": "Toko B",
        "desc_umkm": "Deskripsi Toko B",
        "alamat_umkm": "Alamat Toko B",
        "kelompok_umkm": "Kelompok B" 
    }
]

@app.get("/")
def read_root():
    return {
        "umkm_json": umkm,
        "message": "Data Berhasil Diambil"
    }

@app.post("/umkm/create")
async def add_umkm(data: dict[str,str]):
    if not umkm:
            new_id = 1
    else:
        new_id= max(umkm, key=lambda x: x['id_umkm'])['id_umkm'] +1
    data['id_umkm'] = new_id
    print(new_id)
    umkm.append(data)

    return {"message": "UMKM added successfully", "data": data}

@app.put("/umkm/edit/{umkm_id}")
async def edit_umkm(umkm_id: int, data: dict[str,str]):
    for umkm_item in umkm:
        if umkm_item ["id_umkm"] == umkm_id:
            umkm_id.update(json.dumps(data))
            return {"message": f"UMKM with ID {umkm_id} Updated Successfully", "data": umkm_item}
    raise HTTPException(status_code=404, detail="UMKM not Found")

@app.delete("/umkm/delete/{umkm_id}")
async def delete_umkm(umkm_id: int):
    global umkm
    umkm = [umkm_item for umkm_item in umkm if umkm_item["id_umkm"] != umkm_id]
    return {"message": f"UMKM with ID {umkm_id} Deleted Successfully"}

if __name__=='__main__':
    uvicorn.run(app,host='127.0.0.2',port=1010)