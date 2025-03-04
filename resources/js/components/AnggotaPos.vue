<template>
  <div>
    <h1>Anggota Pos</h1>

    <!-- Form Tambah Anggota -->
    <form @submit.prevent="tambahAnggota">
      <input v-model="newAnggota.user_id" type="number" placeholder="User ID" required />
      <input v-model="newAnggota.nama_lengkap" type="text" placeholder="Nama Lengkap" required />
      <input v-model="newAnggota.tanggal_lahir" type="date" required />
      <input v-model="newAnggota.alamat" type="text" placeholder="Alamat" required />
      <button type="submit">Tambah Anggota</button>
    </form>

    <!-- Daftar Anggota -->
    <ul>
      <li v-for="anggota in anggotaPos" :key="anggota.id">
        {{ anggota.nama_lengkap }} - {{ anggota.alamat }}
        <button @click="editAnggota(anggota)">Edit</button>
        <button @click="hapusAnggota(anggota.id)">Hapus</button>
      </li>
    </ul>

    <!-- Form Edit Anggota -->
    <div v-if="editedAnggota">
      <h3>Edit Anggota</h3>
      <form @submit.prevent="updateAnggota">
        <input v-model="editedAnggota.user_id" type="number" required />
        <input v-model="editedAnggota.nama_lengkap" type="text" required />
        <input v-model="editedAnggota.tanggal_lahir" type="date" required />
        <input v-model="editedAnggota.alamat" type="text" required />
        <button type="submit">Update</button>
        <button @click="editedAnggota = null">Batal</button>
      </form>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      anggotaPos: [],  // Data daftar anggota
      newAnggota: { user_id: "", nama_lengkap: "", tanggal_lahir: "", alamat: "" },
      editedAnggota: null,
    };
  },
  mounted() {
    this.getAnggotaPos(); // Ambil data anggota saat komponen dimuat
  },
  methods: {
    // 🔹 Ambil Data Anggota (READ)
    getAnggotaPos() {
      axios.get("http://127.0.0.1:8000/api/anggota-pos")
        .then(response => {
          this.anggotaPos = response.data;
        })
        .catch(error => console.error("Gagal mengambil data!", error));
    },

    // 🔹 Tambah Anggota Baru (CREATE)
    tambahAnggota() {
      axios.post("http://127.0.0.1:8000/api/anggota-pos", this.newAnggota)
        .then(response => {
          this.anggotaPos.push(response.data); // Tambah ke daftar
          this.newAnggota = { user_id: "", nama_lengkap: "", tanggal_lahir: "", alamat: "" }; // Reset form
        })
        .catch(error => console.error("Gagal menambah anggota!", error));
    },

    // 🔹 Edit Anggota (Menampilkan Form Edit)
    editAnggota(anggota) {
      this.editedAnggota = { ...anggota }; // Duplikasi objek agar tidak langsung mengubah list
    },

    // 🔹 Update Anggota (UPDATE)
    updateAnggota() {
      axios.put(`http://127.0.0.1:8000/api/anggota-pos/${this.editedAnggota.id}`, this.editedAnggota)
        .then(response => {
          let index = this.anggotaPos.findIndex(a => a.id === response.data.id);
          this.anggotaPos[index] = response.data; // Update daftar anggota
          this.editedAnggota = null; // Tutup form edit
        })
        .catch(error => console.error("Gagal update anggota!", error));
    },

    // 🔹 Hapus Anggota (DELETE)
    hapusAnggota(id) {
      if (confirm("Yakin ingin menghapus anggota ini?")) {
        axios.delete(`http://127.0.0.1:8000/api/anggota-pos/${id}`)
          .then(() => {
            this.anggotaPos = this.anggotaPos.filter(a => a.id !== id); // Hapus dari daftar
          })
          .catch(error => console.error("Gagal menghapus anggota!", error));
      }
    }
  }
};
</script>

<style scoped>
/* Styling sederhana */
form {
  margin-bottom: 10px;
}
input {
  margin: 5px;
  padding: 5px;
}
button {
  margin-left: 5px;
  padding: 5px;
  cursor: pointer;
}
</style>
