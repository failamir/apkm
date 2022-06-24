#@title 7. Silahkan unggah Data Mahasiswa yang sedang berlangsung (Ongoing)
# uploaded1 = files.upload()

#@title 8. Proses Prediksi Mahasiswa (Data Ongoing)
#@title
X_test_cv5_plus_name.loc[X_test_cv5_plus_name['PREDIKSI KELULUSAN']==1, 'PREDIKSI KELULUSAN']="Diprediksi Lulus"
#@title
X_test_cv5_plus_name.loc[X_test_cv5_plus_name['PREDIKSI KELULUSAN']==0, 'PREDIKSI KELULUSAN']="Diprediksi Tidak Lulus"
# df6 = pd.read_excel(r'/content/Contoh Data ICE On Going.xlsx')
import sys
x = sys.argv[1]
df6 = pd.read_excel(x)
#Pemilihan variabel independen
df6['Mean_kuis'] = (df6['Kuis_1']+df6['Kuis_2'])/2
X2 = df6[['Nama','Akses_File','Akses_Video','Akses Forum', 'Mean_kuis', 'Tugas_1']]
#Normalisasi Data
for i in range(len(X2)):
  X2.loc[i, "Akses_File_norm"] = (X2['Akses_File'][i] - X['Akses_File'].min())/(X['Akses_File'].max() - X['Akses_File'].min())
  X2.loc[i, "Akses_Video_norm"] = (X2['Akses_Video'][i] - X['Akses_Video'].min())/(X['Akses_Video'].max() - X['Akses_Video'].min())
  X2.loc[i, "Akses_Forum_norm"] = (X2['Akses Forum'][i] - X['Akses Forum'].min())/(X['Akses Forum'].max() - X['Akses Forum'].min())
  X2.loc[i, "Mean_kuis_norm"] = (X2['Mean_kuis'][i] - X['Mean_kuis'].min())/(X['Mean_kuis'].max() - X['Mean_kuis'].min())
  X2.loc[i, "Mean_tugas_norm"] = (X2['Tugas_1'][i] - X['Tugas_1'].min())/(X['Tugas_1'].max() - X['Tugas_1'].min())
#Variabel independen setelah normalisasi
X3 = X2[['Akses_File_norm','Akses_Video_norm','Akses_Forum_norm','Mean_kuis_norm','Mean_tugas_norm']]
X3 = X3.round(6)
#Mengubah Variabel independen ke dalam array
X3_array = np.array(X3)

X_norm = X_norm.round(6)

active2 = X3.loc[(X3['Mean_kuis_norm'] != 0) | (X3['Mean_tugas_norm'] != 0)]
observers2 = X3.loc[(X3['Mean_kuis_norm'] == 0) & (X3['Mean_tugas_norm'] == 0)]

#Daftar Mahasiswa yang Observers (Data Ongoing)
observers2.loc[(observers2['Mean_kuis_norm'] == 0) & (observers2['Mean_tugas_norm'] == 0),'Status'] = "Observers"
result = pd.concat([X2[['Nama']], observers2], axis=1, join='inner')

#Daftar Mahasiswa yang Active (Data Ongoing)
active2.loc[(active2['Mean_kuis_norm'] != 0) | (active2['Mean_tugas_norm'] != 0),'Status'] = "Active"
result2 = pd.concat([X2[['Nama']], active2], axis=1, join='inner')

#Mengecek apakah ada duplikasi antara data ongoing dengan data historis
duplicate = pd.merge(result2, df4[['Akses_File_norm','Akses_Video_norm','Akses_Forum_norm','Mean_kuis_norm','Mean_tugas_norm', 'is_pass']].round(6),
                     on=['Akses_File_norm','Akses_Video_norm', 'Akses_Forum_norm','Mean_kuis_norm','Mean_tugas_norm'],
                     how='inner')
duplicate.loc[duplicate['is_pass']=="Lulus", 'Status']="Diprediksi Lulus"
duplicate.loc[duplicate['is_pass']=="Tidak Lulus", 'Status']="Diprediksi Tidak Lulus"
duplicate.drop(columns=['is_pass'], inplace=True)

non_duplicate = result2.merge(X_norm, on=['Akses_File_norm','Akses_Video_norm',
                                         'Akses_Forum_norm','Mean_kuis_norm','Mean_tugas_norm'],
                         how='left', indicator=True)
non_duplicate = non_duplicate.loc[non_duplicate._merge=='left_only',non_duplicate.columns!='_merge']

X_non_duplicate = non_duplicate[['Akses_File_norm','Akses_Video_norm', 'Akses_Forum_norm','Mean_kuis_norm','Mean_tugas_norm']]
X_non_duplicate_array = np.array(X_non_duplicate)


#fold 1
fknn_new1 = FuzzyKNN(k=3)
fknn_new1.fit(X_train_array_cv1, y_train_array_cv1)
hasil_prediksi_new1 = []
for g in range(0,len(X_non_duplicate_array)):
  prediksi_new1 = fknn_new1.predict(X_non_duplicate_array[[g]])
  hasil_prediksi_new1.append(prediksi_new1)

y_prediksi_new1 = []
for h in range(0,len(hasil_prediksi_new1)):
  z = hasil_prediksi_new1[h][0][0]
 
  y_prediksi_new1.append(z)

#fold 2
fknn_new2 = FuzzyKNN(k=3)
fknn_new2.fit(X_train_array_cv2, y_train_array_cv2)
hasil_prediksi_new2 = []
for g in range(0,len(X_non_duplicate_array)):
  prediksi_new2 = fknn_new2.predict(X_non_duplicate_array[[g]])
  hasil_prediksi_new2.append(prediksi_new2)

y_prediksi_new2 = []
for h in range(0,len(hasil_prediksi_new2)):
  z = hasil_prediksi_new2[h][0][0]
 
  y_prediksi_new2.append(z)

#fold 3
fknn_new3 = FuzzyKNN(k=3)
fknn_new3.fit(X_train_array_cv3, y_train_array_cv3)
hasil_prediksi_new3 = []
for g in range(0,len(X_non_duplicate_array)):
  prediksi_new3 = fknn_new3.predict(X_non_duplicate_array[[g]])
  hasil_prediksi_new3.append(prediksi_new3)

y_prediksi_new3 = []
for h in range(0,len(hasil_prediksi_new3)):
  z = hasil_prediksi_new3[h][0][0]
 
  y_prediksi_new3.append(z)

#fold 4
fknn_new4 = FuzzyKNN(k=3)
fknn_new4.fit(X_train_array_cv4, y_train_array_cv4)
hasil_prediksi_new4 = []
for g in range(0,len(X_non_duplicate_array)):
  prediksi_new4 = fknn_new4.predict(X_non_duplicate_array[[g]])
  hasil_prediksi_new4.append(prediksi_new4)

y_prediksi_new4 = []
for h in range(0,len(hasil_prediksi_new4)):
  z = hasil_prediksi_new4[h][0][0]
 
  y_prediksi_new4.append(z)

#fold 5
fknn_new5 = FuzzyKNN(k=3)
fknn_new5.fit(X_train_array_cv5, y_train_array_cv5)
hasil_prediksi_new5 = []
for g in range(0,len(X_non_duplicate_array)):
  prediksi_new5 = fknn_new5.predict(X_non_duplicate_array[[g]])
  hasil_prediksi_new5.append(prediksi_new5)

y_prediksi_new5 = []
for h in range(0,len(hasil_prediksi_new5)):
  z = hasil_prediksi_new5[h][0][0]
 
  y_prediksi_new5.append(z)

#Menampilkan mahasiswa hasil prediksi
df8 = non_duplicate[['Nama']]
df8["Prediksi1"] = y_prediksi_new1
df8["Prediksi2"] = y_prediksi_new2
df8["Prediksi3"] = y_prediksi_new3
df8["Prediksi4"] = y_prediksi_new4
df8["Prediksi5"] = y_prediksi_new5
#Vote Hasil Prediksi
df8.loc[(df8['Prediksi1']+df8['Prediksi2']+df8['Prediksi3']+df8['Prediksi4']+df8['Prediksi5'])/5 >= 0.5,'Hasil Prediksi'] = "Diprediksi Lulus"
df8.loc[(df8['Prediksi1']+df8['Prediksi2']+df8['Prediksi3']+df8['Prediksi4']+df8['Prediksi5'])/5 < 0.5,'Hasil Prediksi'] = "Diprediksi Tidak Lulus"

#Data Gabungan
result3 = pd.concat([non_duplicate, df8[['Hasil Prediksi']]], axis=1, join='inner')
result3.drop(columns=['Status'], inplace=True)
result3.rename(columns={'Hasil Prediksi':'Status'}, inplace=True)
union = pd.concat([result, duplicate, result3], ignore_index=True)

#@title 9. Proporsi Mahasiswa Active dan Observers (Data Ongoing)
count_active2 = len(active2)
count_observers2 = len(observers2)


labels2 = 'Active = '+str(count_active2), 'Observers = '+str(count_observers2)
sections2 = [count_active2, count_observers2]
colors2 = ['c', 'r']

plt.pie(sections2, labels=labels2, colors=colors2,
        startangle=90,
        explode = (0, 0.1),
        autopct = '%1.2f%%')

#plt.axis('equal') # Try commenting this out.
plt.title('Proporsi Mahasiswa Active dan Observers (Data Ongoing)')
#plt.show()
d['MahasiswaActivedanObserversDataOngoing'] = sections2
#print(sections2)

#@title 10. Proporsi Keseluruhan Mahasiswa (Data Ongoing)
count_lulus = len(union[union['Status']=="Diprediksi Lulus"])
count_tidaklulus = len(union[union['Status']=="Diprediksi Tidak Lulus"])
count_observer = len(union[union['Status']=="Observers"])

labels3 = 'Diprediksi Lulus = '+str(count_lulus), 'Diprediksi Tidak Lulus = '+str(count_tidaklulus), 'Observers = '+str(count_observer)
sections3 = [count_lulus, count_tidaklulus, count_observer]
colors3 = ['c', 'g', 'r']

plt.pie(sections3, labels=labels3, colors=colors3,
        startangle=90)

#plt.axis('equal') # Try commenting this out.
plt.title('Proporsi Keseluruhan Mahasiswa (Data Ongoing)')
#plt.show()
d['KeseluruhanMahasiswaDataOngoing'] = sections3
# print(d)

# datestr = date.min().strftime("%Y%m%d")
# 'filename_{}.csv'.format(datestr)
# 'filename_20140620.csv'

# import csv
# with open('dict.csv', 'w') as csv_file:  
#     writer = csv.writer(csv_file)
#     for key, value in d.items():
#        writer.writerow([key, value])

# To read it back:

# with open('dict.csv') as csv_file:
#     reader = csv.reader(csv_file)
#     mydict = dict(reader)

#print(sections3)

# import simplejson
print(d)
import json
# import sys
newjson = (sys.argv[2] + ".json")
with open(newjson, 'w') as fp:
    json.dump(d, fp)
# json.dumps(d)
# simplejson.dumps(d, sort_keys=True)

#@title 11. Download Hasil Prediksi ke Excel
excelfilename = "Hasil Prediksi.xlsx"
union[['Nama', 'Status']].to_excel(excelfilename, sheet_name='Hasil Prediksi', index=False)
# from google.colab import files
# files.download(excelfilename)