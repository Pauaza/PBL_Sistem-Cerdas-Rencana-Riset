# scrr-ai-service/app.py
from fastapi import FastAPI
from pydantic import BaseModel
import google.generativeai as genai
import json

app = FastAPI()

# 💡 Gunakan konfigurasi standar paling basic & aman tanpa client_options
GENAI_API_KEY = "MASUKKAN API ANDA DISINI"
genai.configure(api_key=GENAI_API_KEY)

class TitleRequest(BaseModel):
    topik: str
    deskripsi: str

@app.post("/api/generate-titles")
def generate_titles(req: TitleRequest):
    
    # 💡 Gunakan 'gemini-pro' sebagai alternatif super stabil jika flash tidak terbaca di env kamu
    model = genai.GenerativeModel('models/gemini-2.5-flash')
    
    prompt = f"""
    Kamu adalah seorang Koordinator Tugas Akhir di jurusan Sistem Informasi Politeknik.
    Berdasarkan input mahasiswa berikut:
    - Topik: {req.topik}
    - Deskripsi Ide/Metode/Tujuan: {req.deskripsi}
    
    Berikan 3 rekomendasi judul skripsi yang sangat spesifik, menggunakan metode ilmiah yang tepat, 
    dan sesuai dengan standar tugas akhir/skripsi mahasiswa vokasi (D4/Politeknik).
    
    Wajib memberikan output dalam format JSON murni tanpa format markdown (jangan gunakan ```json), 
    tanpa teks penjelasan pembuka/penutup, dengan struktur seperti ini:
    {{
      "judul": [
        "Judul Pertama",
        "Judul Kedua",
        "Judul Ketiga"
      ]
    }}
    """
    
    try:
        response = model.generate_content(prompt)
        
        # Bersihkan string respon dari sisa-sisa karakter markdown jika LLM nakal
        clean_text = response.text.strip()
        if clean_text.startswith("```"):
            clean_text = clean_text.split("\n", 1)[1]
        if clean_text.endswith("```"):
            clean_text = clean_text.rsplit("\n", 1)[0]
            
        return json.loads(clean_text.strip())
        
    except Exception as e:
        return {"judul": [f"Gagal generate judul otomatis: {str(e)}"]}