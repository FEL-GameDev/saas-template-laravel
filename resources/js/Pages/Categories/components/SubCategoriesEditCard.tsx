import Card from "@/Components/Card";
import DangerButton from "@/Components/DangerButton";
import {TextField} from "@/Components/Forms/TextField";
import SecondaryButton from "@/Components/SecondaryButton";
import {SubCategoryEdit} from "@/types/categories/category";

interface SubCategoriesEditCardProps {
    readonly subCategories: SubCategoryEdit[];
    readonly errors: any;

    onChange: (subCategories: SubCategoryEdit[]) => void;
}
export function SubCategoriesEditCard({
    subCategories,
    errors,
    onChange,
}: SubCategoriesEditCardProps) {
    return (
        <Card
            heading="Sub-Categories"
            subheading="These are your more specific categories that products will be placed into"
        >
            <div className="mt-6 flex flex-col justify-center gap-4 space-y-4 w-6/12">
                {subCategories.map((subCategory, index) => (
                    <>
                        <div
                            className={`flex flex-col space-y-2 p-4 rounded-lg border ${
                                subCategory.delete ? "opacity-50" : ""
                            } ${
                                subCategory.id
                                    ? ""
                                    : "shadow-md border-green-200"
                            }`}
                        >
                            <TextField
                                fullWidth
                                name={`subCategories[${index}].name`}
                                value={subCategory.name}
                                errors={
                                    ""
                                    // (errors as any)[`subCategories.${index}.name`]
                                }
                                label="Name"
                                onChange={(e: any) => {
                                    const newSubCategories = [...subCategories];

                                    newSubCategories[index].name =
                                        e.target.value;

                                    onChange(newSubCategories);
                                }}
                            />

                            <TextField
                                fullWidth
                                name={`subCategories[${index}].description`}
                                value={subCategory.description || ""}
                                errors={
                                    ""
                                    // (errors as any)[
                                    //     `subCategories.${index}.description`
                                    // ]
                                }
                                label="Description"
                                onChange={(e: any) => {
                                    const newSubCategories = [...subCategories];

                                    newSubCategories[index].description =
                                        e.target.value;

                                    onChange(newSubCategories);
                                }}
                            />
                            <div>
                                {!!subCategory.delete ? (
                                    <SecondaryButton
                                        type="button"
                                        onClick={() => {
                                            debugger;
                                            const newSubCategories = [
                                                ...subCategories,
                                            ];

                                            newSubCategories[index].delete =
                                                false;

                                            onChange(newSubCategories);
                                        }}
                                    >
                                        Restore
                                    </SecondaryButton>
                                ) : (
                                    <DangerButton
                                        type="button"
                                        onClick={() => {
                                            debugger;
                                            const newSubCategories = [
                                                ...subCategories,
                                            ];

                                            if (subCategories[index].id) {
                                                newSubCategories[index].delete =
                                                    true;
                                            } else {
                                                newSubCategories.splice(
                                                    index,
                                                    1
                                                );
                                            }

                                            onChange(newSubCategories);
                                        }}
                                    >
                                        {subCategory.id ? "Delete" : "Remove"}
                                    </DangerButton>
                                )}
                            </div>
                        </div>
                    </>
                ))}
            </div>

            <SecondaryButton
                className="mt-4"
                onClick={() => {
                    onChange([
                        ...subCategories,
                        {
                            name: "",
                            description: "",
                        } as SubCategoryEdit,
                    ]);
                }}
                type="button"
            >
                Add Sub-Category
            </SecondaryButton>
        </Card>
    );
}
